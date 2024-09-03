<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => "Administrateur",
            'email' =>"admin@gmail.com",
            'email_verified_at' => now(),
            'password' => Hash::make('AcademyLoginPass1234'),
            "role" => "admin"
        ]);

        User::create([
            'name' => "Enseignant DOE",
            'email' =>"teacher@gmail.com",
            'email_verified_at' => now(),
            'password' => Hash::make('AcademyLoginPass1234'),
            "role" => "teacher"
        ]);

        User::create([
            'name' => "Eleve DOE",
            'email' =>"student@gmail.com",
            'email_verified_at' => now(),
            'password' => Hash::make('AcademyLoginPass1234'),
            "role" => "student"
        ]);
    }
}
