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
    protected $attributes = [
        'kk' => 'belum_diserahkan',
        'pas_foto' => 'belum_diserahkan',
        'ijazah_akhir' => 'belum_diserahkan',
        'kip' => 'belum_diserahkan',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }
    public function admin()
    {
        return $this->belongsTo(Admin::class, 'updated_by', 'id_admin');
    }
}
