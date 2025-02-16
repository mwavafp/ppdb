<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acara extends Model
{
    use HasFactory;

    protected $table = 'acara';
    protected $primaryKey = 'id_acara'; // digunakan untuk penggantian id
    public $incrementing = true;
    protected $keyType = 'int';
    protected $fillable = [
        'namaAcara',
        'status',
        'awal_acara',
        'akhir_acara',

    ];
    public function userGolongan()
    {
        return $this->hasOne(UserGolongan::class, 'id_harga', 'id_harga');
    }
}
