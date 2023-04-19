<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Offer extends Model
{
    use HasFactory;

    public function schedule() : BelongsTo
    {
        return $this -> belongsTo(Schedule::class);
    }

    protected $fillable = [
        "code",
        "intitule",
        "credit",
        "nature",
        "semestre",
        "semestre_academique",
        "grade",
        "schedule_id"

    ];
}