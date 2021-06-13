<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sewa_kendaraan_umum extends Model
{
    use HasFactory;
    protected $table="sewa_kendaraan_umum";
    protected $fillable = [
        'id',
        'kendaraan_umum_id',
        'user_id',
        'status',
        'tanggal_dipakai',
        'jumlah_hari',
        'total'
    ];
    public function kendaraan_umum(){
        return $this->belongsTo(kendaraan_umum::class);
    }
    public function User(){
        return $this->belongsTo(User::class);
    }
}
