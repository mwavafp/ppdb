<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;
    
    protected $table = 'kelas';
    protected $primaryKey = 'id_kelas'; 
    public $incrementing = true; 
    protected $keyType = 'int'; 
    
    protected $fillable = [
        'unt_pendidikan',
        'kelas',
        'kls_identitas',
        'kls_status',
        'id_contact',  // Pastikan id_contact ada di fillable
    ];
    
    // Relasi ke tabel contact
    public function userUnitPendidikan()
    {
        return $this->hasMany(UserUnitPendidikan::class, 'id_kelas', 'id_kelas'); // user_id foreign key di ortu
    }
    public function contact()
    {
        return $this->belongsTo(Contact::class, 'id_contact', 'id_contact');
    }
}
