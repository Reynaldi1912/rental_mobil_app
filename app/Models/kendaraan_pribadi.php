<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kendaraan_pribadi extends Model
{
    use HasFactory;
    protected $table="kendaraan_pribadi";
    protected $fillable = [
        'id',
        'nama',
        'harga',
        'stok',
        'tipe_mobil',
        'transmisi',
        'jumlah_kursi',
        'foto',
    ];
}
