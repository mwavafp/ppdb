<?php

namespace Database\Factories;

use App\Models\Kelas;
use App\Models\Pembayaran;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserUnitPendidikan>
 */
class UserUnitPendidikanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_bayar' => Pembayaran::factory(),
            'id_kelas' => Kelas::factory(),
            'status' => $this->faker->randomElement(['Alumni', 'Siswa Aktif', 'Siswa Tidak Aktif']),
            'tgl_mulai' => $this->faker->date('Y-m-d'),
            'tgl_berakhir' => $this->faker->date('Y-m-d'),
        ];
    }
}
