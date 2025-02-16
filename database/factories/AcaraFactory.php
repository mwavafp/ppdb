<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Acara>
 */
class AcaraFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'namaAcara' => $this->faker->name(''),
            'status' => $this->faker->randomElement(['aktif', 'tidak_aktif']),
            'awal_acara'  => $this->faker->date('Y-m-d'),
            'akhir_acara' => $this->faker->date('Y-m-d'),


        ];
    }
}
