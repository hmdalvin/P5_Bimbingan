<?php

namespace App\Http\Controllers;

use App\Models\BukuModel;
use App\Models\RakBukuModel;
use Barryvdh\DomPDF\Facade as PDF;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rakbuku =  RakBukuModel::select('rak_buku.id AS idRak', 'buku.id AS idBuku', 'buku.nama_buku', 'buku.tahun_terbit', 'jenis_buku.jenis_buku', 'buku.gambar_buku')->join('buku', 'buku.id', 'rak_buku.id_buku')->join('jenis_buku', 'jenis_buku.id', 'rak_buku.id_jenis_buku')->orderByRaw('rak_buku.id ASC')->get();
        return view('laporan.index', compact('rakbuku'));
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
        $rakBuku1 = BukuModel::select('*')->find($id);
        $path=public_path('images/'.$rakBuku1->gambar_buku);
        return response()->download($path, $rakBuku1->gambar_buku);
    }

    public function generate(){
        $buku = RakBukuModel::select('*','rak_buku.id AS idRak', 'buku.id AS idBuku', 'buku.nama_buku', 'buku.tahun_terbit', 'jenis_buku.jenis_buku')->join('buku', 'buku.id', 'rak_buku.id_buku')->join('jenis_buku', 'jenis_buku.id', 'rak_buku.id_jenis_buku')->orderByRaw('rak_buku.id ASC')->get();
        $pdf = PDF::loadView('laporan.cetakLaporan', ['rakbuku'=>$buku]);
        return $pdf->stream();
    }

}
