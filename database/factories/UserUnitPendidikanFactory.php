<?php

namespace Database\Factories;

use App\Models\Kelas;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserUnitPendidikan>
 */
class UserUnitPendidikanFactory extends Factory
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
            'id_kelas' => Kelas::factory(),
            'status' => $this->faker->randomElement(['aktif', 'tidak_aktif']),
            'tgl_mulai' => $this->faker->date('Y-m-d'),
            'tgl_berakhir' => $this->faker->date('Y-m-d'),
        ];
    }
}
