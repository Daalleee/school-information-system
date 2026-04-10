<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create Admin User
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@sekolah.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);

        // Create Guru User (Contoh)
        User::create([
            'name' => 'Guru Matematika',
            'email' => 'guru@sekolah.com',
            'password' => Hash::make('guru123'),
            'role' => 'guru',
        ]);

        // Create Operator User (Contoh)
        User::create([
            'name' => 'Operator Sekolah',
            'email' => 'operator@sekolah.com',
            'password' => Hash::make('operator123'),
            'role' => 'operator',
        ]);
    }
}
