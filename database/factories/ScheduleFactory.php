<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Schedules>
 */
class ScheduleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $grades = ["Licence","Master", "Doctorat"];
        $natures = ["Licence Professionnelle","Licence Fondamentale","Master de recherche", "Master Professionnel", "Doctorat"];

        $nature = $natures[random_int(0,4)];
       
        $titre =  fake() -> firstName();

        $diplome = $nature . " - " . $titre;
        
        return [
            "domaine" => fake() -> lastName(),
            "titre_diplome" => $diplome,
            "grade" => "Licence" /* $grades[random_int(0,2)] */,
            "nbr_semestres" => 6 /* random_int(2,6) */,
            "school_id" => 1  /* random_int(1,23) */
        ];
    }
}