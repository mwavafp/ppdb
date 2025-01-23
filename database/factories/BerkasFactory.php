<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory
 */
class BerkasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'kk' => $this->faker->randomElement(['diserahkan', 'belum_diserahkan']),
            'pas_foto' => $this->faker->randomElement(['diserahkan', 'belum_diserahkan']),
            'ijazah_akhir' => $this->faker->randomElement(['diserahkan', 'belum_diserahkan']),
            'kip' => $this->faker->randomElement(['diserahkan', 'belum_diserahkan'])

        ];
    }
}
