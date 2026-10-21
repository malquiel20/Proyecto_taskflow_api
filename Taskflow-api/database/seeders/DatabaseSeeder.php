<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UserSeeder::class,    // <--- Agrégalo aquí de primero
            ProjectSeeder::class,
            TaskSeeder::class,
        ]);
    }
}