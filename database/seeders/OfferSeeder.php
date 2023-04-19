<?php

namespace Database\Seeders;

use App\Models\Offer;
use App\Models\Schedule;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OfferSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $schedules = Schedule::all();

        function sems($i)
        {
            if(is_int($i % 2)) {
                return "HARMATTAN";
            }
            else
            {
                return "MOUSSON";
            }
        };

        foreach ($schedules as $schedule) {

            /**
             * offres
             */

             for ($i=0; $i < $schedule -> nbr_semestres ; $i++) {
                $credits = [];

                while (array_sum($credits) < 30) {
                    array_push($credits, random_int(1, 6));
                }

                if(array_sum($credits) > 30) {
                    array_pop($credits);
                    $value =  30 - array_sum($credits);
                    
                    if($value > 0)
                    {
                        array_push($credits, $value);
                    }
                    
                }

                foreach($credits as $credit) {
                 
                    $options = ['Fondamentale', 'Complémentaire', 'Transversale', 'Spécialité', 'Approfondissement', 'UE Libre'];

                    Offer::create([
                        "code" => random_int(23874, 3494049),
                        "intitule" => fake() ->jobTitle(),
                        "credit" => $credit,
                        "nature" =>  $options[random_int(0, 5)],
                        "semestre" =>  $i + 1,
                        "semestre_academique" => sems($i),
                        "grade" => $schedule -> grade,
                        "schedule_id" => $schedule -> id

                    ]);
                }
            }



        }
        Offer::factory(757) -> create();
    }

}