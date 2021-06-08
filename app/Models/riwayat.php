<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class riwayat extends Model
{
    use HasFactory;
    protected $table="riwayat";
    protected $fillable = [
        'id',
        'nama_kendaraan',
        'nama_penyewa',
        'status',
        'tgl_pinjam',
        'biaya',
        'nik',
        'created_at',
    ];
}
