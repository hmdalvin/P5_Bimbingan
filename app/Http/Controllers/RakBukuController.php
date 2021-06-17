<?php

namespace App\Http\Controllers;

use App\Models\BukuModel;
use App\Models\RakBukuModel;
use Facade\FlareClient\Stacktrace\File as StacktraceFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class RakBukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rakbuku =  RakBukuModel::select('rak_buku.id AS idRak', 'buku.id AS idBuku', 'buku.nama_buku', 'buku.tahun_terbit', 'jenis_buku.jenis_buku', 'buku.gambar_buku')->join('buku', 'buku.id', 'rak_buku.id_buku')->join('jenis_buku', 'jenis_buku.id', 'rak_buku.id_jenis_buku')->orderByRaw('rak_buku.id ASC')->get();
        return view('rakbuku.index', compact('rakbuku'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rakbuku.tambahBuku');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // encrypte file in form input as enctype="multipart/form-data"
        $file = $request->file('gambar');
        $nama_file = time()."_".$file->getClientOriginalName();

        //$save_upload = 'data_file';
        $file->move(\base_path()."/public/images", $nama_file);


        $bukuId = BukuModel::create([
            'nama_buku' => $request->buku,
            'tahun_terbit' => $request->tahun,
            'gambar_buku' => $nama_file ?? ""
        ]);

        RakBukuModel::create([
            'id_buku' => $bukuId->id,
            'id_jenis_buku' => $request->jenis
        ]);
        return redirect('rakbuku');
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
        $rakBuku = BukuModel::select('*')->find($id);
        return view('rakbuku.editBuku', ['editbuku'=>$rakBuku]);
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
        $rakBuku = BukuModel::select('*')->find($id);
        $rakBuku->nama_buku = $request->buku ?? "";
        $rakBuku->tahun_terbit = $request->tahun ?? "";

        $file = $request->file('gambar');
        $nama_file = time()."_".$file->getClientOriginalName();

        //$save_upload = 'data_file';
        $file->move(\base_path()."/public/images", $nama_file);


        $rakBuku->gambar_buku = $nama_file ?? "";
        $rakBuku->save();

        $rakBuku1 = RakBukuModel::select('*', 'rak_buku.id_buku AS idBuku')->find($id);
        $rakBuku1->id_jenis_buku = $request->jenis;
        $rakBuku1->save();
        return redirect('rakbuku');
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
        File::delete('images/'.$rakBuku1->gambar_buku);

        $rakBuku1->delete();

        $rakBuku1 = RakBukuModel::select('*', 'rak_buku.id_buku AS idBuku')->find($id);
        $rakBuku1->delete();



        return redirect('rakbuku');

    }
}
