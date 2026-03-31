<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Usuario; // <-- IMPORTANTE

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Usuario::factory()->create([
            'nombre' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('password123'),
        ]);
    }
}
