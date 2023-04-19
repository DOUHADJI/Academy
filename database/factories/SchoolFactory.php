<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Nette\Utils\Random;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Schools>
 */
class SchoolFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $grades=["Licence", "Licence - Master", "Licence - Master - Doctorat"];
        return [
            "nom" => "Institut " .fake() ->lastName() . " " . fake() -> firstName(),
            "sigle" => fake() ->countryISOAlpha3(),
            "grades_disponibles" => $grades[random_int(0,2)]
        ];
    }
}