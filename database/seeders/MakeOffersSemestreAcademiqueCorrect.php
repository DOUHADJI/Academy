<?php

namespace Database\Seeders;

use App\Models\Offer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MakeOffersSemestreAcademiqueCorrect extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $offers = Offer::all();

        foreach($offers as $offer)
        {
            if($offer->semestre == "2" ||$offer->semestre == "4" || $offer->semestre == "6")
            {
                $offer->update([
                    "semestre_academique" => 'MOUSSON'
                ]);
            }
        }
    }
}