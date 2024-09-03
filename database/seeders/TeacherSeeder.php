<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=0; $i < 12 ; $i++) {
            User::create([
                'name' => fake()->name() ,
                'email' => fake()->email(),
                'email_verified_at' => now(),
                'password' => Hash::make('AcademyLoginPass1234'),
                "role" => "teacher"
            ]);
        }
    }
}
