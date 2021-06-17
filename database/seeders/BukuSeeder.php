<?php

namespace Database\Seeders;

use App\Models\BukuModel;
use Illuminate\Database\Seeder;

class BukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $buku1 = new BukuModel();
        $buku1->nama_buku = 'Cybersecurity';
        $buku1->tahun_terbit = '2008';
        $buku1->gambar_buku = '';
        $buku1->save();

        $buku2 = new BukuModel();
        $buku2->nama_buku = 'Di Setiap Malam';
        $buku2->tahun_terbit = '2010';
        $buku2->gambar_buku = '';
        $buku2->save();

        $buku3 = new BukuModel();
        $buku3->nama_buku = 'Sejarah Bangsa Indonesia';
        $buku3->tahun_terbit = '2015';
        $buku3->gambar_buku = '';
        $buku3->save();
    }
}
