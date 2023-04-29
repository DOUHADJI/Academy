<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolYear extends Model
{
    use HasFactory;

    protected $fillable = [
        "start",
        "end",
        "extend_start",
        "extend_end",
        "inscription_start",
        "inscription_end",
        "extend_inscription_start",
        "extend_inscription_end",
        "harmattan_start",
        "harmattan_end",
        "hollydays_harmattan_start",
        "hollydays_harmattan_end",
        "harmattan_exams_start",
        "harmattan_exams_end",
        "mousson_start",
        "mousson_end",
        "hollydays_mousson_start",
        "hollydays_mousson_end",
        "mousson_exams_start",
        "mousson_exams_end",
        "is_current"
        
        
    ];
}