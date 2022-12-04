<?php

namespace App\Http\Controllers;

use App\Models\DataGuru;
use App\Models\Hasil;
use App\Models\Kriteria;
use App\Models\Nilai;
use App\Models\Periode;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PerhituganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $periode = Periode::all();

        return view('perhitungan', compact('periode'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $periode_pilihan = Periode::findOrFail($id);

        $cek_nilai = Nilai::where('id_periode', $id)->first();

        if (empty($cek_nilai)) {
            Alert::error('Gagal', 'Data Nilai Belum Diinput');
            return back();
        }

        $kriteria = Kriteria::all();

        $guru = DataGuru::whereIn('id', function ($query) use ($id) {
            $query->select('id_guru')->from('nilai')->where('id_periode', $id);
        })->get();

        $kriteria->each(function ($item) use ($periode_pilihan) {
            $item->nilai_max = Nilai::where('id_kriteria', $item->id)
                ->where('id_periode', $periode_pilihan->id)
                ->max('nilai');

            $item->nilai_sum = Nilai::where('id_kriteria', $item->id)
                ->where('id_periode', $periode_pilihan->id)
                ->sum('nilai') + $item->nilai_max;

            $item->normalisasi_kriteria = $item->nilai_max / $item->nilai_sum;

            $item->normalisasi_terbobot = $item->normalisasi_kriteria * $item->bobot->nilai_roc;

        });

        $a0_si = $kriteria->sum('normalisasi_terbobot');

        $guru->each(function ($item) use ($kriteria, $periode_pilihan, $a0_si) {
            $si_tampung = [];
            $kriteria->each(function ($k) use ($item, $periode_pilihan, &$si_tampung) {
                $nilai = Nilai::where('id_kriteria', $k->id)
                    ->where('id_guru', $item->id)
                    ->where('id_periode', $periode_pilihan->id)
                    ->first()->nilai;

                $normalisasi_kriteria = $nilai / $k->nilai_sum;
                $normalisasi_terbobot = $normalisasi_kriteria * $k->bobot->nilai_roc;

                Nilai::where('id_kriteria', $k->id)
                    ->where('id_guru', $item->id)
                    ->where('id_periode', $periode_pilihan->id)
                    ->update([
                        'normalisasi_kriteria' => $normalisasi_kriteria,
                        'normalisasi_bobot' => $normalisasi_terbobot,
                    ]);
                $si_tampung[] = $normalisasi_terbobot;
            });

            $si = array_sum($si_tampung);

            Hasil::updateOrCreate(
                [
                    'id_guru' => $item->id,
                    'id_periode' => $periode_pilihan->id,
                ],
                [
                    'si' => $si,
                    'ki' => $si / $a0_si,
                ]
            );
        });

        $hasil = Hasil::where('id_periode', $periode_pilihan->id)
            ->orderBy('ki', 'desc')
            ->get();

        $rank = 1;
        $hasil->each(function ($item) use (&$rank) {
            $item->update([
                'rank' => $rank++,
            ]);
        });

        $hasil_perhitungan = Hasil::where('id_periode', $periode_pilihan->id)
            ->orderBy('id_guru', 'asc')
            ->get();

        $hasil_nilai = $guru->map(function ($item) use ($kriteria, $periode_pilihan) {
            $tampung = [];
            $kriteria->each(function ($k) use ($item, $periode_pilihan, &$tampung) {
                $nilai_perhitungan = Nilai::where('id_kriteria', $k->id)
                    ->where('id_guru', $item->id)
                    ->where('id_periode', $periode_pilihan->id)
                    ->first();

                array_push($tampung, $nilai_perhitungan);
            });

            $item->nilai_perhitungan = $tampung;

            return $item;
        });

        return view('perhitungan', compact('periode_pilihan', 'kriteria', 'a0_si', 'hasil_perhitungan', 'hasil_nilai'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
