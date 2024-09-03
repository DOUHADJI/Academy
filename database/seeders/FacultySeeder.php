<?php

namespace Database\Seeders;

use App\Models\Faculty;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FacultySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faculties = [
            "Medecine",
            "Sciences",
            "Sciences Humaine",
            "Faculté des sciences économiques et de gestion"
        ];

        foreach ($faculties as $faculty) {
            $model = new Faculty();
            $model->name = Str::upper($faculty);
            $model->slug = Str::slug($faculty);
            $model->tag = $faculty;
            $model->director_id = 1;
            $model->save();
        }
    }
}
