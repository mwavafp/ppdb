<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $primaryKey = 'id_user'; // digunakan untuk penggantian id
    public $incrementing = true; 
    protected $keyType = 'int'; 
    protected $fillable = [
        'username',
        'email',
        'password',
        'name' ,
            'alamat',
            'gender',
            'nisn',
            'tgl_lahir',
            'tmpt_lahir',
            'asl_sekolah' ,

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function ortu()
    {
        return $this->hasOne(Ortu::class, 'id_user', 'id_user'); // user_id foreign key di ortu
    }
    public function userUnitPendidikan()
    {
        return $this->hasMany(UserUnitPendidikan::class, 'id_user', 'id_user'); // user_id foreign key di ortu
    }
}
