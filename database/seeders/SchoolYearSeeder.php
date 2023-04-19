<?php

namespace Database\Seeders;

use App\Models\SchoolYear;
use DateTime;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SchoolYearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $date = new DateTime();
        
        SchoolYear::create([
            
           "start" => date("2023-04-17"),
           "end"  => date("2024-01-16"),
            
           "extend_start" => date("2024-01-17"),
           "extend_end" => date("2024-04-16"),
            
           "inscription_start" => date("2023-05-17"),
           "inscription_end" => date("2023-07-16"),
            
           "extend_inscription_start" => date("2023-05-17"),
           "extend_inscription_end" => date("2023-05-17"),
            
           "harmattan_start" => date("2023-05-17"),
           "harmattan_end"  => date("2023-05-17"),
            
           "hollydays_harmattan_start" => date("2023-05-17"),
           "hollydays_harmattan_end" => date("2023-05-17"),
            
           "harmattan_exams_start" => date("2023-05-17"),
           "harmattan_exams_end" => date("2023-05-17"),
            
             
           
           "mousson_start" => date("2023-05-17"),
           "mousson_end" => date("2023-05-17"),
            
           "hollydays_mousson_start" => date("2023-05-17"),
           "hollydays_mousson_end" => date("2023-05-17"),
            
           "mousson_exams_start" => date("2023-05-17"),
           "mousson_exams_end" => date("2023-05-17"),
           
        ]);
    }
}