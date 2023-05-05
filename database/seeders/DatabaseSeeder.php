<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Offer;
use App\Models\Schedule;
use App\Models\School;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => fake()->name(),
            'email' => "admin@test.com",
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'role' => "admin"
        ]);

        User::create([
            'name' => fake()->name(),
            'email' => "student@test.com",
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'role' => "student"
        ]);

        User::create([
            'name' => fake()->name(),
            'email' => "professor@test.com",
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'role' => "professor"
        ]);
        
        $this->call([
            
            SchoolSeeder::class,
            ScheduleSeeder::class,
            OfferSeeder::class
        ]); 

        
    }

}