<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Sock;
use App\Models\User;

class SockSeeder extends Seeder
{
    public function run(): void
    {
        // Asegura que exista al menos un usuario
        $user = User::first() ?? User::factory()->create();

        // Crear 5 calcetas (socks) asociadas al usuario
        Sock::create([
            'Guy' => 'Blue Striped',
            'URL' => 'https://example.com/sock1.jpg',
            'Upload_Date' => now(),
            'users_id' => $user->id,
        ]);

        Sock::create([
            'Guy' => 'Red Dotted',
            'URL' => 'https://example.com/sock2.jpg',
            'Upload_Date' => now(),
            'users_id' => $user->id,
        ]);

        Sock::create([
            'Guy' => 'Green Plain',
            'URL' => 'https://example.com/sock3.jpg',
            'Upload_Date' => now(),
            'users_id' => $user->id,
        ]);

        Sock::create([
            'Guy' => 'Yellow Classic',
            'URL' => 'https://example.com/sock4.jpg',
            'Upload_Date' => now(),
            'users_id' => $user->id,
        ]);

        Sock::create([
            'Guy' => 'Purple Modern',
            'URL' => 'https://example.com/sock5.jpg',
            'Upload_Date' => now(),
            'users_id' => $user->id,
        ]);
    }
}
