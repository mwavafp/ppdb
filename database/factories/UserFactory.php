<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
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
            'username' => $this->faker->userName,
            'password' => Hash::make($this->faker->password), // You can replace 'password' with a default value
            'name' => $this->faker->name,
            'alamat' => $this->faker->address,
            'nisn' => $this->faker->randomNumber(8), // Generate random 8-digit NISN
            'gender' => $this->faker->randomElement(['laki-laki', 'perempuan']),
            'tmpt_lahir' => $this->faker->city,
            'tgl_lahir' => $this->faker->date,
            'asl_sekolah' => $this->faker->company,
            'status' => $this->faker->randomElement(['aktif', 'tidak_aktif']),
            'email' => $this->faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn(array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
