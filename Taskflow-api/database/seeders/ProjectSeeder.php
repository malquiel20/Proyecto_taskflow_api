<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\User;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        // Aseguramos que exista al menos un usuario para el campo 'created_by'
        $user = User::first() ?? User::factory()->create();

        Project::create([
            'name' => 'Plataforma E-commerce',
            'description' => 'Desarrollo de tienda online con pasarela de pagos.',
            'start_date' => now(),
            'end_date' => now()->addMonths(2),
            // 'status' se llenará automáticamente con el valor por defecto ('planning')
            'created_by' => $user->id,
        ]);

        Project::create([
            'name' => 'App Móvil de Tareas',
            'description' => 'Aplicación multiplataforma para gestión de pendientes.',
            'start_date' => now(),
            'end_date' => now()->addMonth(),
            // Si necesitas un estado diferente, puedes revisar qué valores acepta tu Enum ProjectStatus (ej. 'active', 'progress', etc.)
            'created_by' => $user->id,
        ]);
    }
}