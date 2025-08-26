<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    protected $table = 'berita';
    protected $primaryKey = 'id_berita'; 

    protected $fillable = [
        'judul',
        'abstrak',
        'isi',
        'gambar',
        'kategori_id',
        'k_unit_id',
    ];

   public function kategori()
{
    return $this->belongsTo(Kategori::class, 'id_kategori', 'id_kategori');
}


   public function kUnit()
{
    return $this->belongsTo(Kunit::class, 'id_unit', 'id_unit');
}

    /**
     * Get the WhatsApp URL with the message
     *
     * @return string
     */
    
}
