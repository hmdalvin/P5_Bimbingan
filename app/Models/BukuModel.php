<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BukuModel extends Model
{
    use HasFactory;

    protected $table = 'buku';
    public $timestamps = false;


    protected $fillable = [
        'id',
        'nama_buku',
        'tahun_terbit',
        'gambar_buku'
    ];
}
