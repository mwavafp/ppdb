<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserUnitPendidikan extends Model
{
    use HasFactory;
    protected $table = 'user_unit_pendidikan';
    protected $primaryKey = 'id_uup'; // digunakan untuk penggantian id
    public $incrementing = true;
    protected $keyType = 'int';
    protected $fillable = [
        'id_bayar',
        'id_kelas',
        'status',
        'tgl_mulai',
        'tgl_berakhir'

    ];

    public function userUnitPendidikan()
    {
        return $this->hasOne(UserUnitPendidikan::class, 'id_uup', 'id_uup');
    }

    public function kelas()
    {
        return $this->belongsTo(User::class, 'id_kelas', 'id_kelas');
    }
    public function pembayaran()
    {
        return $this->belongsTo(Pembayaran::class, 'id_bayar', 'id_bayar');
    }
}
