<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Usa firstOrCreate para evitar duplicados si ya existe el correo
        User::firstOrCreate(
            ['email' => 'admin@taskflow.com'], // Condición de búsqueda
            [
                'name' => 'Administrador',
                'password' => Hash::make('password123'),
                'is_active' => 1,
            ]
        );

        // Opcional: Si quieres agregar usuarios de prueba adicionales con factory
        // User::factory(3)->create();
    }
}