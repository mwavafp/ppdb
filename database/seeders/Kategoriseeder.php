<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kategori;

class KategoriSeeder extends Seeder
{
    public function run(): void
    {
        Kategori::insert([
            ['nama' => 'Pendidikan'],
            ['nama' => 'Teknologi'],
            ['nama' => 'Ekonomi'],
        ]);
    }
}
