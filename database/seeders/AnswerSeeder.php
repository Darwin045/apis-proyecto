<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Aswer;
use App\Models\User;
use App\Models\Topic;

class AswerSeeder extends Seeder
{
    public function run(): void
    {
        // Asegurarse de tener usuarios y topics
        User::factory()->count(5)->create();
        Topic::factory()->count(5)->create();

        // Crear respuestas (aswers)
        Aswer::factory()->count(10)->create();
    }
}
