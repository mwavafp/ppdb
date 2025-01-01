<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Kelas>
 */
class KelasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'unt_pendidikan' => $this->faker->randomElement(['tk', 'sd', 'smp', 'sma', 'tpq', 'madin', 'pondok']),
            'kelas' => $this->faker->randomElement(['-', '1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12']),
            'kls_identitas' => $this->faker->randomElement(['-', 'A', 'B', 'C', 'D', 'E', 'F']),
            'kls_status' => $this->faker->randomElement(['Alumni', 'Siswa Aktif', 'Siswa Tidak Aktif']),
        ];
    }
}
