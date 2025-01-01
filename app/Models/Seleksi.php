<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seleksi extends Model
{
    use HasFactory;
    protected $table = 'seleksi';
    protected $primaryKey = 'id_seleksi'; // digunakan untuk penggantian id
    public $incrementing = true;
    protected $keyType = 'int';
    protected $fillable = [
        'id_user',
        'status_seleksi'

    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }
}
