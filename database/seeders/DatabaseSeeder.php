<?php

namespace Database\Seeders;

use App\Models\Kelas;
use App\Models\Pembayaran;
use App\Models\User;
use App\Models\Ortu;
use App\Models\UserUnitPendidikan;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    
    public function run(): void
    {
      

       $user= User::factory()->create([
            'username'=>'user',
        'email'=>'user@gmail.com',
        'password'=>'user1234',
        'name' =>'User Prasetyo',
            'alamat'=>'Jalan User Tenggara no.23, welington, DC',
            'nisn'=>123456,
            'tgl_lahir'=>'2024-12-03',
            'tmpt_lahir'=>'DC',
            'asl_sekolah'=>'sdn Pekalongan DC' ,

        ]);

        Ortu::factory()->create([
            'id_user'=>$user->id_user,
        'nmr_kk'=>123456,
        'nm_ayah'=>'User Sunjarya',
        'nik_ayah'=>123456,
        'tgl_lhr_ayah'=>'2024-12-03',
        'tmpt_lhr_ayah'=>'DC Cakung',
        'almt_ayah'=>'DC Cakung',
        'pekerjaan_ayah'=>"penguasa",
        'nmr_ayah_wa'=>123456,
        'nm_ibu'=>'User Wenty',
        'nik_ibu'=>123456,
        'tgl_lhr_ibu'=>'2024-12-03',
        'tmpt_lhr_ibu'=>'DC MU',
        'almt_ibu'=>'MU',
        'pekerjaan_ibu'=>'rhs',
        'nmr_ibu_wa'=>123445
        ]);
        
        User::factory(100)->create()->each(function ($user) {
            Ortu::factory()->create([
                'id_user' => $user->id_user,//penimpaan data
            ]);
            Pembayaran::factory()->create([
                'id_user' => $user->id_user,//penimpaan data
            ]);
            UserUnitPendidikan::factory()->create([
                'id_user' => $user->id_user,//penimpaan data
            ]);
        });
        Kelas::factory(100)->create()->each(function ($kelas){
            UserUnitPendidikan::factory()->create([
                'id_kelas' => $kelas->id_kelas,//penimpaan data
            ]);
        });
    }
}
