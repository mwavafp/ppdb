<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kunit;

class KunitSeeder extends Seeder
{
    public function run(): void
    {
        Kunit::insert([
            ['unit' => 'Humas'],
            ['unit' => 'IT Support'],
            ['unit' => 'Keuangan'],
        ]);
    }
}
