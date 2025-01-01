<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berkas extends Model
{
    use HasFactory;
    protected $table = 'berkas';
    protected $primaryKey = 'id_brks'; // digunakan untuk penggantian id
    public $incrementing = true;
    protected $keyType = 'int';
    protected $fillable = [
        'id_user',
        'kk',
        'pas_foto',
        'ijazah_akhir',
        'kip',

    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }
}
