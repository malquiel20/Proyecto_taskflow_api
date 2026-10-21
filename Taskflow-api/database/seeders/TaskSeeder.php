<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Task;
use App\Models\Project;
use App\Models\User;

class TaskSeeder extends Seeder
{
    public function run(): void
    {
        $projects = Project::all();
        $user = User::first() ?? User::factory()->create();

        // Si no hay proyectos, salimos para evitar errores
        if ($projects->isEmpty()) {
            return;
        }

        // Recorremos cada proyecto para asignarle varias tareas (por ejemplo, 5 tareas por cada proyecto)
        foreach ($projects as $project) {
            for ($i = 1; $i <= 5; $i++) {
                Task::create([
                    'project_id' => $project->id,
                    'assigned_to' => $user->id,
                    'created_by' => $user->id,
                    'title' => "Tarea de prueba {$i} para " . $project->name,
                    'description' => "Esta es la descripción detallada de la tarea número {$i}.",
                    'due_date' => now()->addDays($i * 2),
                    'priority' => 'medium',
                    'status' => 'pending',
                ]);
            }
        }
    }
}