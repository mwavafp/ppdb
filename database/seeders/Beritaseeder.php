<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Berita;
use App\Models\Kategori;
use App\Models\Kunit;

class BeritaSeeder extends Seeder
{
    public function run(): void
    {
        // Ambil ID dari kategori dan unit
        $kategoriIds = Kategori::pluck('id_kategori')->all();
        $unitIds = Kunit::pluck('id_unit')->all();

        // Buat beberapa data dummy berita
        Berita::create([
            'judul' => 'Perkembangan Pendidikan di Era Digital',
            'abstrak' => 'Ringkasan tentang perkembangan pendidikan.',
            'isi' => 'Isi lengkap mengenai bagaimana pendidikan berubah dengan teknologi.',
            'gambar' => null,
            'id_kategori' => $kategoriIds[0],
            'id_unit' => $unitIds[0],
        ]);

        Berita::create([
            'judul' => 'Teknologi AI Mengubah Dunia',
            'abstrak' => 'AI dan dampaknya terhadap industri.',
            'isi' => 'Pembahasan mendalam tentang penerapan AI di berbagai sektor.',
            'gambar' => null,
            'id_kategori' => $kategoriIds[1],
            'id_unit' => $unitIds[1],
        ]);
    }
}
