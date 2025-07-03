<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory
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

            'byr_dft_ulang' => $this->faker->randomElement(['lunas', 'belum']),
            'jmlh_byr' => $this->faker->numerify('#######'),
        ];
    }
}
