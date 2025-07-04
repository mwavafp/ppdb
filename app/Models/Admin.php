<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{

    use HasFactory, Notifiable;
    protected $guard = 'admin';
    protected $table = 'admins';
    protected $primaryKey = 'id_admin'; // digunakan untuk penggantian id
    public $incrementing = true;
    protected $keyType = 'int';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'name',
        'nip',
        'email',
        'password',
        'password2',
        'role'
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
    

     public function user()
    {
        return $this->hasMany(Admin::class); 
    }
    public function pembayaran()
    {
        return $this->hasMany(Admin::class); 
    }
    public function berkas()
    {
        return $this->hasMany(Admin::class); 
    }

}
