<?php

namespace App\Http\Controllers;

use App\Models\DataGuru;
use App\Models\Kriteria;
use App\Models\Nilai;
use App\Models\Periode;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PenilaianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $periode = Periode::all();

        return view('penilaian', compact('periode'));
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

        $id_guru = $request->id_guru;
        $id_periode = $request->id_periode;

        foreach ($request->id_kriteria as $key => $id_kriteria) {
            $nilai = $request->nilai[$key];

            $data = [
                'id_guru' => $id_guru,
                'id_periode' => $id_periode,
                'id_kriteria' => $id_kriteria,
                'nilai' => is_null($nilai) ? 0 : (float) $nilai,
            ];

            $insert[] = $data;
        }

        Nilai::insert($insert);

        Alert::success('Berhasil', 'Data Berhasil Ditambahkan');

        return back();
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
        $kriteria = Kriteria::all();
        $guru = DataGuru::whereIn('id', function ($query) use ($id) {
            $query->select('id_guru')->from('nilai')->where('id_periode', $id);
        })->get();

        $data_guru = DataGuru::whereNotIn('id', function ($query) use ($id) {
            $query->select('id_guru')->from('nilai')->where('id_periode', $id);
        })->get();

        $guru->each(function ($item) use ($kriteria, $periode_pilihan) {
            $item->kriteria = $kriteria->map(function ($kriteria) use ($item, $periode_pilihan) {
                $nilai = Nilai::where('id_guru', $item->id)
                    ->where('id_kriteria', $kriteria->id)
                    ->where('id_periode', $periode_pilihan->id)
                    ->first();

                if (!empty($nilai)) {
                    return [
                        'id' => $kriteria->id,
                        'nama_kriteria' => $kriteria->nama_kriteria,
                        'nilai' => $nilai->nilai,
                    ];
                }
            });
        });

        return view('penilaian', compact('periode_pilihan', 'kriteria', 'guru', 'data_guru'));
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
        $guru = DataGuru::findOrFail($id);

        foreach ($request->id_kriteria as $key => $id_kriteria) {
            $nilai = $request->nilai[$key];

            Nilai::updateOrCreate(
                [
                    'id_guru' => $guru->id,
                    'id_periode' => $request->id_periode,
                    'id_kriteria' => $id_kriteria,
                ],
                [
                    'nilai' => is_null($nilai) ? 0 : (float) $nilai,
                ]
            );
        }

        Alert::success('Berhasil', 'Data Berhasil Diubah');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $guru = DataGuru::findOrFail($id);

        Nilai::where('id_guru', $guru->id)
            ->where('id_periode', $request->id_periode)
            ->delete();

        Alert::success('Berhasil', 'Data Berhasil Dihapus');

        return back();
    }
}
