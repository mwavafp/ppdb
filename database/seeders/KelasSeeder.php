<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KelasSeeder extends Seeder
{
    public function run()
    {
        DB::table('kelas')->insert([ 
            // Additional random data entries (no duplicates):
            ['kelas' => 6, 'kls_identitas' => 'A', 'kls_status' => 'Lolos', 'name' => 'Ilham', 'unt_pendidikan' => 'SD'],
            ['kelas' => 5, 'kls_identitas' => 'B', 'kls_status' => 'Tidak Lolos', 'name' => 'Siti', 'unt_pendidikan' => 'SD'],
            ['kelas' => 4, 'kls_identitas' => 'C', 'kls_status' => 'Belum Ditentukan', 'name' => 'Budi', 'unt_pendidikan' => 'SD'],
            ['kelas' => 7, 'kls_identitas' => 'A', 'kls_status' => 'Belum Ditentukan', 'name' => 'Halili', 'unt_pendidikan' => 'SMP'],
            ['kelas' => 10, 'kls_identitas' => 'C', 'kls_status' => 'Belum Ditentukan', 'name' => 'Farhan', 'unt_pendidikan' => 'SMA'],
            ['kelas' => 10, 'kls_identitas' => 'B', 'kls_status' => 'Belum Ditentukan', 'name' => 'Timothy', 'unt_pendidikan' => 'SMA'],
            ['kelas' => 9, 'kls_identitas' => 'A', 'kls_status' => 'Belum Ditentukan', 'name' => 'Wava', 'unt_pendidikan' => 'SMP'],
            ['kelas' => 6, 'kls_identitas' => 'A', 'kls_status' => 'Lolos', 'name' => 'Alif', 'unt_pendidikan' => 'SD'],
            ['kelas' => 8, 'kls_identitas' => 'B', 'kls_status' => 'Tidak Lolos', 'name' => 'Nina', 'unt_pendidikan' => 'SMP'],
            ['kelas' => 11, 'kls_identitas' => 'A', 'kls_status' => 'Lolos', 'name' => 'Karin', 'unt_pendidikan' => 'SMA'],
            ['kelas' => 5, 'kls_identitas' => 'A', 'kls_status' => 'Tidak Lolos', 'name' => 'Dina', 'unt_pendidikan' => 'SD'],
            ['kelas' => 12, 'kls_identitas' => 'C', 'kls_status' => 'Belum Ditentukan', 'name' => 'Jaka', 'unt_pendidikan' => 'SMA'],
            ['kelas' => 7, 'kls_identitas' => 'C', 'kls_status' => 'Belum Ditentukan', 'name' => 'Fauzan', 'unt_pendidikan' => 'SMP'],
            ['kelas' => 8, 'kls_identitas' => 'A', 'kls_status' => 'Lolos', 'name' => 'Gina', 'unt_pendidikan' => 'SMP'],
            ['kelas' => 9, 'kls_identitas' => 'B', 'kls_status' => 'Lolos', 'name' => 'Edo', 'unt_pendidikan' => 'SMP'],
            ['kelas' => 10, 'kls_identitas' => 'A', 'kls_status' => 'Tidak Lolos', 'name' => 'Syamsul', 'unt_pendidikan' => 'SMA'],
            ['kelas' => 6, 'kls_identitas' => 'C', 'kls_status' => 'Lolos', 'name' => 'Zahra', 'unt_pendidikan' => 'SD'],
            ['kelas' => 11, 'kls_identitas' => 'B', 'kls_status' => 'Belum Ditentukan', 'name' => 'Rika', 'unt_pendidikan' => 'SMA'],
            ['kelas' => 4, 'kls_identitas' => 'B', 'kls_status' => 'Belum Ditentukan', 'name' => 'Bambang', 'unt_pendidikan' => 'SD'],
            ['kelas' => 5, 'kls_identitas' => 'A', 'kls_status' => 'Lolos', 'name' => 'Putri', 'unt_pendidikan' => 'SD'],
            ['kelas' => 6, 'kls_identitas' => 'B', 'kls_status' => 'Belum Ditentukan', 'name' => 'Arif', 'unt_pendidikan' => 'SD'],
            ['kelas' => 9, 'kls_identitas' => 'C', 'kls_status' => 'Lolos', 'name' => 'Alam', 'unt_pendidikan' => 'SMP'],
            ['kelas' => 12, 'kls_identitas' => 'A', 'kls_status' => 'Tidak Lolos', 'name' => 'Lina', 'unt_pendidikan' => 'SMA'],
            ['kelas' => 10, 'kls_identitas' => 'A', 'kls_status' => 'Lolos', 'name' => 'Rahma', 'unt_pendidikan' => 'SMA'],
            ['kelas' => 11, 'kls_identitas' => 'C', 'kls_status' => 'Tidak Lolos', 'name' => 'Dina', 'unt_pendidikan' => 'SMA'],
            ['kelas' => 6, 'kls_identitas' => 'C', 'kls_status' => 'Lolos', 'name' => 'Mila', 'unt_pendidikan' => 'SD'],
            ['kelas' => 7, 'kls_identitas' => 'B', 'kls_status' => 'Tidak Lolos', 'name' => 'Wasi', 'unt_pendidikan' => 'SMP'],
            ['kelas' => 9, 'kls_identitas' => 'A', 'kls_status' => 'Lolos', 'name' => 'Rizky', 'unt_pendidikan' => 'SMP'],
        ]);  
    }
}
