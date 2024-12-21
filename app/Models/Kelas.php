<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;
    protected $table = 'kelas';
    protected $primaryKey = 'id_kelas'; // digunakan untuk penggantian id
    public $incrementing = true; 
    protected $keyType = 'int'; 
    protected $fillable=[
        'name',
        'unt_pendidikan',
        'kelas',
        'kls_identitas',
        'kls_status',
      
    ];
    public function userUnitPendidikan()
    {
        return $this->hasMany(UserUnitPendidikan::class, 'id_kelas', 'id_kelas'); // user_id foreign key di ortu
    }
}
