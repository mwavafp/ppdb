<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory
 */
class AdminFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(), // Nama random
            'nip' => $this->faker->unique()->numerify('##########'), // NIP dengan 10 angka unik
            'email' => $this->faker->unique()->safeEmail(), // Email random
            'password' => $this->faker->name(), // Password hash (default: "password")
            'role' => $this->faker->randomElement(['admin', 'superAdmin']), // Role random
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
}
