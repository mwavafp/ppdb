<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ortu extends Model
{
    use HasFactory;
    protected $table = 'ortu';
    protected $primaryKey = 'id_ortu'; // digunakan untuk penggantian id
    public $incrementing = true; 
    protected $keyType = 'int'; 
    protected $fillable=[
        'id_user',
        'nmr_kk',
        'nm_ayah',
        'nik_ayah',
        'tgl_lhr_ayah',
        'tmpt_lhr_ayah',
        'almt_ayah',
        'pekerjaan_ayah',
        'nmr_ayah_wa',
        'nm_ibu',
        'nik_ibu',
        'tgl_lhr_ibu',
        'tmpt_lhr_ibu',
        'almt_ibu',
        'pekerjaan_ibu',
        'nmr_ibu_wa'
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }
}
