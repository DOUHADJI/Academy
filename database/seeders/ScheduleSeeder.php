<?php

namespace Database\Seeders;

use App\Models\Schedule as ScheduleModel;
use App\Models\School;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $grades = [
            [
                "grade" => "Licence",
                "natures" => [
                    "Licence Professionnelle",
                    "Licence Fondamentale"
                ]
            ],

            [
                    "grade" => "Master",
                    "natures" => [
                        "Master de recherche",
                        "Master Professionnel"
                    ]
            ],

            [
                "grade" => "Doctorat",
                "natures" => [
                    "Doctorat",
                    "PhD"
                ]
             ]
        ];

        $schools = School::all();

        foreach ($schools as $school) {

            $int = random_int(1, 3);

            if (Str::contains($school ->grades_disponibles, 'Licence')) 
            {
                $nature = $grades[0]["natures"][random_int(1, 2) - 1];
                $titre =  fake() -> jobTitle();
                $diplome = $nature . " - " . $titre;

                ScheduleModel::factory($int) ->create([
                    "domaine" => $titre,
                    "titre_diplome" => $diplome,
                    "grade" =>  $grades[0]["grade"],
                    "nbr_semestres" => 6 ,
                    "school_id" => $school -> id
                ]);
            };

            if (Str::contains($school ->grades_disponibles, 'Licence - Master')) 
            {
                $nature = $grades[1]["natures"][random_int(1, 2) - 1];
                $titre =  fake() -> jobTitle();
                $diplome = $nature . " - " . $titre;

                ScheduleModel::factory($int) ->create([
                    "domaine" => $titre,
                    "titre_diplome" => $diplome,
                    "grade" =>  $grades[1]["grade"],
                    "nbr_semestres" => 6 ,
                    "school_id" => $school -> id
                ]);
            };


            if (Str::contains($school ->grades_disponibles, 'Licence - Master - Doctorat')) 
            {
                $nature = $grades[2]["natures"][random_int(1, 2) - 1];
                $titre =  fake() -> jobTitle();
                $diplome = $nature . " - " . $titre;

                ScheduleModel::factory($int) ->create([
                    "domaine" => $titre,
                    "titre_diplome" => $diplome,
                    "grade" =>  $grades[2]["grade"],
                    "nbr_semestres" => 6 ,
                    "school_id" => $school -> id
                ]);
            };

            
              
            




        }


        $schedules = ScheduleModel::all();

        foreach ($schedules  as $schedule) {

            if($schedule -> grade == "Master") {
                $schedule -> update([
                    "nbr_semestres" => 4
                ]);
            }

        }

    }
}