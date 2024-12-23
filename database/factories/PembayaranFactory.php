<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PembayaranFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
           'id_user' => User::factory(),
            'byr_dft_ulang' => $this->faker->randomElement(['lunas', 'belum']),
            'status' => $this->faker->randomElement(['Cicil', 'DP','Lunas']),
            'jmlh_byr' => $this->faker->numerify('#######'),
        ];
    }
}
