<?php

namespace Database\Factories;

use App\Models\Acara;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Harga>
 */
class HargaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'unitPendidikan' => $this->faker->randomElement(['tk', 'sd', 'smp', 'sma', 'madin', 'pondok_sma', 'pondok_smp']),
            'gender' => $this->faker->randomElement(['laki-laki', 'perempuan']),
            'tipe_siswa' => $this->faker->randomElement(['alumni', 'umum']),
            'total_bayar_daful' => $this->faker->numerify('########'),
            'dp_daful' => $this->faker->numerify('########'),
            'diskon' => $this->faker->numerify('########'),
            'id_acara' => $this->faker->numerify('########'),

        ];
    }
}
