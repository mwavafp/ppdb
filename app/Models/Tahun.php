<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tahun extends Model
{
    use HasFactory;
    protected $table = 'tahun';
    protected $primaryKey = 'id_tahun'; // digunakan untuk penggantian id
    public $incrementing = true;
    protected $keyType = 'int';
    protected $fillable = [
        'nama',
        'awal',
        'akhir',
    ];
}
