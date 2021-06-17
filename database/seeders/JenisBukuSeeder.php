<?php

namespace Database\Seeders;

use App\Models\JenisBukuModel;
use Illuminate\Database\Seeder;

class JenisBukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $buku1 = new JenisBukuModel();
        $buku1->jenis_buku = 'Sejarah';
        $buku1->save();

        $buku2 = new JenisBukuModel();
        $buku2->jenis_buku = 'Novel';
        $buku2->save();

        $buku3 = new JenisBukuModel();
        $buku3->jenis_buku = 'Teknologi';
        $buku3->save();
    }
}
