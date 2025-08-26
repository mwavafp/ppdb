<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kunit extends Model
{
    use HasFactory;

    protected $table = 'k_unit';

    protected $fillable = [
        'unit',
    ];

    public function berita()
{
    return $this->hasMany(Berita::class, 'id_unit', 'id_unit');
}


    /**
     * Get the WhatsApp URL with the message
     *
     * @return string
     */
    
}
