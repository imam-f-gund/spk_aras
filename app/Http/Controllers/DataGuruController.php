<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\DataGuru;

class DataGuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = DataGuru::all();
        return view('dataguru', compact('data'));
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
            'nama' => 'required',
            'pns_gtt' => 'required',
        ]);

        $data = new DataGuru;
        $data->nama = $request->nama;
        $data->pns_gtt = $request->pns_gtt;
        $data->save();

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
            'nama' => 'required',
            'pns_gtt' => 'required',
        ]);

        $data = DataGuru::findOrFail($id);
        $data->nama = $request->nama;
        $data->pns_gtt = $request->pns_gtt;
        $data->save();

        Alert::success('Berhasil', 'Data Berhasil Ditambahkan');
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
        $data = DataGuru::findOrFail($id);
        $data->delete();

        Alert::success('Berhasil', 'Data Berhasil Dihapus');
        return back();
    }
}
