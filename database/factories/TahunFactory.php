<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory
 */
class TahunFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

            'nama' => $this->faker->name(),
            'awal'  => $this->faker->date('Y-m-d'),
            'akhir' => $this->faker->date('Y-m-d'),


        ];
    }
}
