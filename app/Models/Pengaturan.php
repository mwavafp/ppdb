<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Yayasan extends Model
{
    use HasFactory;

    protected $table = 'yayasan';
    protected $fillable = [
        'deskripsi',
        'keunggulan',
        'visi_misi',
        'alasan_memilih_1',
        'alasan_memilih_2',
        'alasan_memilih_3',
        'alasan_memilih_4',
        'alasan_memilih_5',
        'alasan_memilih_6',
        'alur_pendaftaran_1',
        'alur_pendaftaran_2',
        'alur_pendaftaran_3',
        'alur_pendaftaran_4',
        'alur_pendaftaran_5',
    ];
    protected $primaryKey = 'id_yayasan';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = false;
}

class Tk extends Model
{
    use HasFactory;

    protected $table = 'tk';
    protected $fillable = [
        'deskripsi',
        'visi',
        'misi',
    ];
    protected $primaryKey = 'id_tk';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = false;
}

class Sd extends Model
{
    use HasFactory;

    protected $table = 'sd';
    protected $fillable = [
        'deskripsi',
        'visi',
        'misi',
    ];
    protected $primaryKey = 'id_sd';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = false;
}

class Smp extends Model
{
    use HasFactory;

    protected $table = 'smp';
    protected $fillable = [
        'deskripsi',
        'visi',
        'misi',
    ];
    protected $primaryKey = 'id_smp';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = false;
}

class Sma extends Model
{
    use HasFactory;

    protected $table = 'sma';
    protected $fillable = [
        'deskripsi',
        'visi',
        'misi',
    ];
    protected $primaryKey = 'id_sma';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = false;
}

class Tpq extends Model
{
    use HasFactory;

    protected $table = 'tpq';
    protected $fillable = [
        'deskripsi',
        'visi',
        'misi',
    ];
    protected $primaryKey = 'id_tpq';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = false;
}

class Madin extends Model
{
    use HasFactory;

    protected $table = 'madin';
    protected $fillable = [
        'deskripsi',
        'visi',
        'misi',
    ];
    protected $primaryKey = 'id_madin';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = false;
}

class Pondok extends Model
{
    use HasFactory;

    protected $table = 'pondok';
    protected $fillable = [
        'deskripsi',
        'visi',
        'misi',
    ];
    protected $primaryKey = 'id_pondok';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = false;
}
