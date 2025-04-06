<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Harga extends Model
{
    use HasFactory;

    protected $table = 'harga';
    protected $primaryKey = 'id_harga'; // digunakan untuk penggantian id
    public $incrementing = true;
    protected $keyType = 'int';
    protected $fillable = [
        'id_acara',
        'unitPendidikan',
        'gender',
        'tipe_siswa',
        'total_bayar_daful',
        'dp_daful',
        'diskon',
    ];
    public function userGolongan()
    {
        return $this->hasOne(UserGolongan::class, 'id_harga', 'id_harga');
    }
    public function acara()
    {
        return $this->belongsTo(Acara::class, 'id_acara', 'id_acara');
    }
}
