<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory
 */
class NoteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

            'unit' => $this->faker->randomElement(['tk', 'sd', 'smp', 'sma', 'pondok','madin']),
            'catatan' => $this->faker->name,


        ];
    }
}
