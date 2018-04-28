<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class WisataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $data['menu'] = 3;
      $data['wisata'] = \App\Wisata::get();
      return view('pages.wisata.wisata')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['menu'] = 3;
        return view('pages.wisata.wisata_tambah')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $kode_wisata       = $request->kode_wisata;
      $nama_wisata       = $request->nama_wisata;
      $alamat            = $request->alamat;

      if(Input::hasFile('gambar')){
        $file = input::file('gambar');
        $file->move('uploads', $file->getClientOriginalName());
      }

      $wisata = new \App\Wisata;
      $wisata->kode_wisata  = $kode_wisata;
      $wisata->nama_wisata  = $nama_wisata;
      $wisata->alamat       = $alamat;
      $wisata->gambar       = $file->getClientOriginalName();
      $wisata->save();
      return redirect('/wisata');
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
      $data['menu']   = 3;
      $data['wisata'] = \App\Wisata::find($id);
      return view('pages.wisata.wisata_edit')->with($data);
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
      $kode_wisata       = $request->kode_wisata;
      $nama_wisata       = $request->nama_wisata;
      $alamat            = $request->alamat;

      $wisata = \App\Wisata::find($id);
      $wisata->kode_wisata  = $kode_wisata;
      $wisata->nama_wisata  = $nama_wisata;
      $wisata->alamat       = $alamat;

      if(Input::hasFile('gambar')){
        $file = input::file('gambar');
        $file->move('uploads', $file->getClientOriginalName());
        $wisata->gambar       = $file->getClientOriginalName();
      }

      $wisata->save();
      return redirect('/wisata');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $wisata = \App\Wisata::find($id);
        $wisata->delete();
        return redirect('/wisata');
    }

    public function cetak(){
      $pdf = PDF::loadView('pages.wisata.laporan');
      return $pdf->download('laporan_wisata.pdf');
    }
}
