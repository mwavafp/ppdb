<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class SeleksiFactory extends Factory
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
            'status_seleksi' => $this->faker->randomElement(['TIDAK LOLOS', 'PENDING', 'LOLOS']),
        ];
    }
}
