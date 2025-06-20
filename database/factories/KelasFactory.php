<?php

namespace Database\Factories;

use App\Models\Kelas;
use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;

class KelasFactory extends Factory
{
    protected $model = Kelas::class;

    public function definition(): array
    {
        return [
            'unt_pendidikan' => $this->faker->randomElement(['tk', 'sd', 'smp', 'sma', 'madin', 'pondok_smp', 'pondok_sma']),
            'kelas' => $this->faker->randomElement(['1', '2', '3', '4', '5', '6', '7', '8', '9']),
            'kls_identitas' => $this->faker->randomElement(['A', 'B', 'C']),
            'kls_status' => $this->faker->randomElement(['Siswa Aktif', 'Siswa Tidak Aktif', 'Alumni']),
            'id_contact' => Contact::factory()->create()->id_contact

        ];
    }
}
