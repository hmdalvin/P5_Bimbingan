<?php

namespace Database\Seeders;

use App\Models\RakBukuModel;
use Illuminate\Database\Seeder;

class RakBukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $buku1 = new RakBukuModel();
        $buku1->id_buku = '1';
        $buku1->id_jenis_buku = '3';
        $buku1->save();

        $buku2 = new RakBukuModel();
        $buku2->id_buku = '2';
        $buku2->id_jenis_buku = '2';
        $buku2->save();

        $buku3 = new RakBukuModel();
        $buku3->id_buku = '3';
        $buku3->id_jenis_buku = '1';
        $buku3->save();
    }
}
