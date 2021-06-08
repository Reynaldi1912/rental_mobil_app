<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sewa_kendaraan_pribadi extends Model
{
    use HasFactory;
    protected $table="sewa_kendaraan_pribadi";
    protected $fillable = [
        'id',
        'kendaraan_pribadi_id',
        'user_id',
        'status',
        'tanggal_dipakai',
        'jumlah_hari'
    ];
    public function kendaraan_pribadi(){
        return $this->belongsTo(kendaraan_pribadi::class);
    }
    public function User(){
        return $this->belongsTo(User::class);
    }
}
