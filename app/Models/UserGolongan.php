<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserGolongan extends Model
{
    use HasFactory;

    protected $table = 'user_golongan';
    protected $primaryKey = 'id_ug'; // digunakan untuk penggantian id
    public $incrementing = true;
    protected $keyType = 'int';
    protected $fillable = [
        'id_acara',
        'id_harga',
        'id_user',
        'id_uup',
    ];
    public function userGolongan()
    {
        return $this->hasOne(UserGolongan::class, 'id_ug', 'id_ug');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }
    public function userUnitPendidikan()
    {
        return $this->belongsTo(UserUnitPendidikan::class, 'id_uup', 'id_uup');
    }
    public function acara()
    {
        return $this->belongsTo(Acara::class, 'id_acara', 'id_acara');
    }
    public function harga()
    {
        return $this->belongsTo(Harga::class, 'id_harga', 'id_harga');
    }
}
