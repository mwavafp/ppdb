<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengaturanKontak extends Model
{
    use HasFactory;

    protected $table = 'contact_settings';
    
    protected $fillable = [
        'email',
        'address',
        'facebook_url',
        'instagram_url',
        'whatsapp_url',
        'youtube_url',
        'building_image',
    ];

    /**
     * Get the base64 encoded building image
     *
     * @return string|null
     */
    public function getBuildingImageBase64Attribute()
    {
        if (!$this->building_image) {
            return null;
        }
        
        return 'data:image/jpeg;base64,' . base64_encode($this->building_image);
    }
}