<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    protected $fillable = [
        'nama',
        'jumlah',
        'ukuran',
        'foto',
        'tanggal_masuk',
        'harga',
    ];
}
