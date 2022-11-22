<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Kriteria;

class KriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $kriteria = Kriteria::orderBy('id', 'DESC')->get();
        return view('kriteria', compact('kriteria'));
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
        request()->validate([
            'kode_kriteria' => 'required',
            'nama_kriteria' => 'required',
            'keterangan' => 'required',
        ]);

        $kriteria = new Kriteria;
        $kriteria->kode_kriteria = $request->kode_kriteria;
        $kriteria->nama_kriteria = $request->nama_kriteria;
        $kriteria->keterangan = $request->keterangan;
        $kriteria->save();

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
        //
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
        request()->validate([
            'kode_kriteria' => 'required',
            'nama_kriteria' => 'required',
            'keterangan' => 'required',
        ]);

        $kriteria = Kriteria::findOrFail($id);
        $kriteria->kode_kriteria = $request->kode_kriteria;
        $kriteria->nama_kriteria = $request->nama_kriteria;
        $kriteria->keterangan = $request->keterangan;
        $kriteria->save();

        Alert::success('Berhasil', 'Data Berhasil Diubah');
        return back();
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
        $kriteria = Kriteria::findOrFail($id);
        $kriteria->delete();

        Alert::success('Berhasil', 'Data Berhasil Dihapus');
        return back();
    }
}
