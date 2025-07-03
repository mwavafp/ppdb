<?php

namespace App\Models;

use App\Traits\HasFormatRupiah;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $table = 'pembayaran';
    protected $primaryKey = 'id_bayar'; // digunakan untuk penggantian id
    public $incrementing = true;
    protected $keyType = 'int';
    protected $fillable = [

        'byr_dft_ulang',
        'status',
        'jmlh_byr',
        'jmlh_byr2',
        'jmlh_byr3',
        'jmlh_byr4',
    ];
    protected $attributes = [
        'byr_dft_ulang' => 'belum',
        'status' => 'Cicil',
    ];
    //needbelong
    public function pembayaran()
    {
        return $this->hasOne(Pembayaran::class, 'id_bayar', 'id_bayar'); // user_id foreign key di ortu
    }
    public function admin()
    {
        return $this->belongsTo(Admin::class, 'updated_by', 'id_admin');
    }
}
