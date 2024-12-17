<?php

namespace Database\Factories;

use App\Models\Ortu;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ortu>
 */
class OrtuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Ortu::class;//biar nyambung ke Ortu model
    public function definition(): array
    {
        return [
            'id_user' => User::factory(), // Membuat user terkait secara otomatis
            'nmr_kk' => $this->faker->numerify('######'), // Angka 6 digit
            'nm_ayah' => $this->faker->name('male'), // Nama ayah
            'nik_ayah' => $this->faker->numerify('###########'), // NIK ayah, 12-16 digit
            'tgl_lhr_ayah' => $this->faker->date('Y-m-d'), // Tanggal lahir ayah
            'tmpt_lhr_ayah' => $this->faker->city(), // Tempat lahir ayah
            'almt_ayah' => $this->faker->address(), // Alamat ayah
            'pekerjaan_ayah' => $this->faker->jobTitle(), // Pekerjaan ayah
            'nmr_ayah_wa' => $this->faker->numerify('08##########'), // Nomor WA ayah
            'nm_ibu' => $this->faker->name('female'), // Nama ibu
            'nik_ibu' => $this->faker->numerify('###########'), // NIK ibu, 12-16 digit
            'tgl_lhr_ibu' => $this->faker->date('Y-m-d'), // Tanggal lahir ibu
            'tmpt_lhr_ibu' => $this->faker->city(), // Tempat lahir ibu
            'almt_ibu' => $this->faker->address(), // Alamat ibu
            'pekerjaan_ibu' => $this->faker->jobTitle(), // Pekerjaan ibu
            'nmr_ibu_wa' => $this->faker->numerify('08##########'), // Nomor WA ibu
        ];
    }
}
