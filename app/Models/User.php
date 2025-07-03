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
        'password',
        'password2',
        'name',
        'alamat',
        'gender',
        'nisn',
        'tgl_lahir',
        'tmpt_lahir',
        'asl_sekolah',
        'tipe_siswa',
        'updated_by',
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

            'password' => 'hashed',
        ];
    }
    public function userGolongan()
    {
        return $this->hasOne(UserGolongan::class, 'id_harga', 'id_harga');
    }
    public function ortu()
    {
        return $this->hasOne(Ortu::class, 'id_user', 'id_user'); // user_id foreign key di ortu
    }
    public function berkas()
    {
        return $this->hasOne(Berkas::class, 'id_user', 'id_user'); // user_id foreign key di ortu
    }
   
    public function seleksi()
    {
        return $this->hasOne(Seleksi::class, 'id_user', 'id_user'); // user_id foreign key di ortu
    }
    public function userUnitPendidikan()
    {
        return $this->hasMany(UserUnitPendidikan::class, 'id_user', 'id_user'); // user_id foreign key di ortu
    }
    public function admin()
    {
        return $this->belongsTo(Admin::class, 'updated_by', 'id_admin');
    }
    public function kelas()
    {
        return $this->hasManyThrough(
            Kelas::class,
            UserUnitPendidikan::class,
            'id_user', // Foreign key di UserUnitPendidikan
            'id_kelas', // Foreign key di Kelas
            'id_user', // Primary key di User
            'id_kelas' // Primary key di UserUnitPendidikan
        );
    }
}
