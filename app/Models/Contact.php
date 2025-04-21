<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $table = 'contact';
    protected $primaryKey = 'id_contact'; 
    public $incrementing = true; 
    protected $keyType = 'int'; 
    
    protected $fillable = [
        'nama',
        'cp',
    ];

    // Relasi ke tabel kelas
    public function kelas()
    {
        return $this->hasMany(Kelas::class, 'id_contact', 'id_contact');  // Relasi one-to-many
    }
}
