<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'kategori';

    protected $fillable = [
        'nama',
    ];

    public function berita()
{
    return $this->hasMany(Berita::class, 'id_kategori', 'id_kategori');
}


    /**
     * Get the WhatsApp URL with the message
     *
     * @return string
     */
    
}
