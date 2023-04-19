<?php

namespace Database\Factories;

use App\Models\Offer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\offers>
 */
class OfferFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $sems = ['HARMATTAN', 'MOUSSON'];
        $options = ['Fondamentale', 'Complémentaire', 'Transversale', 'Spécialité', 'Approfondissement', 'UE Libre'];
        $grades = ["Licence","Master", "Doctorat"];

      

        

        return [
            "code" => random_int(23874, 3494049),
            "intitule" => fake() ->jobTitle(),
            "credit" => random_int(1,10),
            "nature" =>  $options[random_int(0,5)],
            "semestre" =>  random_int(2,6),
            "semestre_academique" => $sems[ random_int(0,1)],
            "grade" => $grades[random_int(0,2)],
            "schedule_id" => random_int(1,48)
         
            
        ];
    }
}