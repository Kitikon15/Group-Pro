<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create test user if not exists
        if (!User::where('email', 'test@example.com')->exists()) {
            User::factory()->create([
                'name' => 'Test User',
                'email' => 'test@example.com',
            ]);
        }
        
        // Create admin user with specified credentials
        if (!User::where('email', 'admin@gmail.com')->exists()) {
            User::factory()->create([
                'name' => 'Admin User',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('admin'),
                'is_admin' => true,
            ]);
        }
        
        // Create kitikon15 user if not exists
        if (!User::where('email', 'kitikon15@example.com')->exists()) {
            User::factory()->create([
                'name' => 'Kitikon User',
                'email' => 'kitikon15@example.com',
                'password' => Hash::make('0015'),
            ]);
        }
        
        // Create kitikon user with correct email if not exists
        if (!User::where('email', 'kitikon@gmail.com')->exists()) {
            User::factory()->create([
                'name' => 'Kitikon User',
                'email' => 'kitikon@gmail.com',
                'password' => Hash::make('kitikon15'),
            ]);
        }

        // Create mix user if not exists
        if (!User::where('email', 'mix@gmail.com')->exists()) {
            User::factory()->create([
                'name' => 'Mix User',
                'email' => 'mix@gmail.com',
                'password' => Hash::make('mix027'),
            ]);
        }
        
        // Create tea user if not exists
        if (!User::where('email', 'tea@gmail.com')->exists()) {
            User::factory()->create([
                'name' => 'Tea User',
                'email' => 'tea@gmail.com',
                'password' => Hash::make('tea004'),
            ]);
        }
        
        // Seed news, courses, personnels, and settings data
        $this->call([
            NewsTableSeeder::class,
            CoursesTableSeeder::class,
            PersonnelsTableSeeder::class,
            SettingsTableSeeder::class,
        ]);
    }
}