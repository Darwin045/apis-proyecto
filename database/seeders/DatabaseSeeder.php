<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Seeders\NotificationSeeder;
use Database\Seeders\SockSeeder;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Evita duplicados con firstOrCreate
        User::firstOrCreate(
            ['email' => 'test@example.com'],
            [
                'name' => 'Test User',
                'password' => bcrypt('password')
            ]
        );

        // Llama a los seeders secundarios
        $this->call([
            NotificationSeeder::class,
            SockSeeder::class,
            AnswerSeeder::class,
        ]);
    }
}
