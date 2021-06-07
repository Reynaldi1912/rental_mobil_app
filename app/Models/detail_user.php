<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detail_user extends Model
{
    use HasFactory;
    protected $table="user_detail";
    protected $fillable = [
        'id',
        'nik',
        'nama_lengkap',
        'jenis_kelamin',
        'alamat_lengkap',
        'no_hp',
        'ktp',
        'user_id',
    ];
    public function User(){
        return $this->belongsTo(User::class);
    }

}
