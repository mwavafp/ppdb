<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Yayasan extends Model
{
    use HasFactory;

    // Menentukan nama tabel yang sesuai dengan migration
    protected $table = 'yayasan';

    // Menentukan kolom yang dapat diisi massal
    protected $fillable = [
        'deskripsi',
        'keunggulan',
        'visi',
        'misi',
    ];

    // Jika kolom ID tidak mengikuti konvensi, kita bisa menentukan nama kolom primary key
    protected $primaryKey = 'id_yayasan';

    // Jika kolom ID bukan auto increment atau menggunakan tipe data selain integer, kita bisa menambahkan properti berikut
    public $incrementing = true;
    protected $keyType = 'int';

    // Menentukan bahwa kolom timestamp tidak digunakan
    public $timestamps = false;
}
