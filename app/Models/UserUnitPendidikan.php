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
    protected $fillable=[
        'id_user',
        'id_kelas',
        'status',
        'tgl_mulai',
        'tgl_berakhir'
        
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }
    public function kelas()
    {
        return $this->belongsTo(User::class, 'id_kelas', 'id_kelas');
    }
}
