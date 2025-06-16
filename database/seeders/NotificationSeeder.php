<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Notification;
use App\Models\Trainer;

class NotificationSeeder extends Seeder
{
    public function run(): void
    {
        // Asegurarse de que haya entrenadores primero
        Trainer::factory()->count(5)->create();

        $trainers = Trainer::all();

        foreach ($trainers as $trainer) {
            Notification::create([
                'Trainer_id'  => $trainer->id,
                'Title'       => 'Notificación para ' . $trainer->name,
                'Description' => 'Esta es una notificación de prueba para el entrenador ' . $trainer->name,
            ]);
        }
    }
}
