<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PengaturanTablesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            
            'yayasan' => [
                'deskripsi' => $this->faker->paragraph(2),
                'alasan_memilih_1' => $this->faker->sentence(6),
                'alasan_memilih_2' => $this->faker->sentence(6),
                'alasan_memilih_3' => $this->faker->sentence(6),
                'alasan_memilih_4' => $this->faker->sentence(6),
                'alasan_memilih_5' => $this->faker->sentence(6),
                'alasan_memilih_6' => $this->faker->sentence(6),
                'keunggulan' => $this->faker->sentence(10),
                'visi_misi' => $this->faker->paragraph(3),
                'alur_pendaftaran_1' => $this->faker->sentence(5),
                'alur_pendaftaran_2' => $this->faker->sentence(5),
                'alur_pendaftaran_3' => $this->faker->sentence(5),
                'alur_pendaftaran_4' => $this->faker->sentence(5),
                'alur_pendaftaran_5' => $this->faker->sentence(5),
            ],

            'tk' => [
                'deskripsi' => $this->faker->paragraph(6),
                'visi' => 'Tk Nurul Huda II sebagai pusat pengembangan Ilmu Pengetahuan dan Teknologi (IPTEK) serta peningkatan Iman dan Taqwa (IMTAQ).',
                'misi' => $this->faker->paragraph(2),
            ],
            // Data dummy untuk tabel sd
            'sd' => [
                'deskripsi' => $this->faker->paragraph(6),
                'visi' => 'SD Nurul Huda II sebagai pusat pengembangan Ilmu Pengetahuan dan Teknologi (IPTEK) serta meningkatkan Iman dan Taqwa (IMTAQ).',
                'misi' => $this->faker->paragraph(4),
            ],
            // Data dummy untuk tabel smp
            'smp' => [
                'deskripsi' => $this->faker->paragraph(6),
                'visi' => '"MENCETAK GENERASI MASA DEPAN YANG BERTAQWA, BERILMU DAN BERAKHLAQUL KARIMAH".',
                'misi' => $this->faker->paragraph(2),
            ],
            // Data dummy untuk tabel sma
            'sma' => [
                'deskripsi' => $this->faker->paragraph(6),
                'visi' => '"MENCETAK GENERASI MASA DEPAN YANG BERTAQWA, BERILMU DAN BERAKHLAQUL KARIMAH".',
                'misi' => $this->faker->paragraph(2),
            ],

            'tpq' => [
                'deskripsi' => $this->faker->paragraph(6),
                'visi' => 'Berakhlah Mulia dan Beribadah Sempurna Adalah Karakter Siswa Santri Nurul Huda.',
                'misi' => $this->faker->paragraph(2),
            ],

            'madin' => [
                'deskripsi' => $this->faker->paragraph(6),
                'visi' => 'Berakhlah Mulia dan Beribadah Sempurna Adalah Karakter Siswa Santri Nurul Huda.',
                'misi' => $this->faker->paragraph(2),
            ],

            'pondok' => [
                'deskripsi' => $this->faker->paragraph(6),
                'visi' => 'Berakhlah Mulia dan Beribadah Sempurna Adalah Karakter Siswa Santri Nurul Huda.',
                'misi' => $this->faker->paragraph(2),
            ],

        ];
    }
}
