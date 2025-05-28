<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KontakAdmin extends Model
{
    use HasFactory;

    protected $table = 'contact_people';
    
    protected $fillable = [
        'name',
        'description',
        'phone',
        'whatsapp_message',
        'photo',
    ];

    /**
     * Get the WhatsApp URL with the message
     *
     * @return string
     */
    public function getWhatsappUrlAttribute()
    {
        $phone = preg_replace('/[^0-9]/', '', $this->phone);
        $message = urlencode($this->whatsapp_message ?? 'Assalamualaikum');
        
        return "https://wa.me/{$phone}?text={$message}";
    }

    /**
     * Get the base64 encoded photo
     *
     * @return string|null
     */
    public function getPhotoBase64Attribute()
    {
        if (!$this->photo) {
            return null;
        }
        
        return 'data:image/jpeg;base64,' . base64_encode($this->photo);
    }
}