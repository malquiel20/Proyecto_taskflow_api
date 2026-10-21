<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Task;
use App\Models\Project;
use App\Models\User;
use App\Enums\TaskPriority;
use App\Enums\TaskStatus;

class TaskSeeder extends Seeder
{
    public function run(): void
    {
        // Obtenemos un proyecto y un usuario existentes para cumplir con las llaves foráneas
        $project = Project::first();
        $user = User::first() ?? User::factory()->create();

        if ($project) {
            Task::create([
                'project_id' => $project->id,
                'assigned_to' => $user->id,
                'created_by' => $user->id,
                'title' => 'Diseñar base de datos',
                'description' => 'Crear diagrama entidad-relación y definir tablas.',
                'due_date' => now()->addDays(5),
                'priority' => TaskPriority::High, // Usando tu Enum de prioridad
                'status' => TaskStatus::Pending,     // Usando tu Enum de estado
            ]);

            Task::create([
                'project_id' => $project->id,
                'assigned_to' => $user->id,
                'created_by' => $user->id,
                'title' => 'Configurar autenticación',
                'description' => 'Implementar sistema de login y tokens.',
                'due_date' => now()->addDays(10),
                'priority' => TaskPriority::Medium, // Usando tu Enum de prioridad
                'status' => TaskStatus::InProgress, // Usando tu Enum de estado
            ]);
        }
    }
}