<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;
    protected $table = 'pembayaran';
    protected $primaryKey = 'id_bayar'; // digunakan untuk penggantian id
    public $incrementing = true; 
    protected $keyType = 'int'; 
    protected $fillable=[
        'id_user',
        'byr_dft_ulang',
        'status',
        'jmlh_byr',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }
}
