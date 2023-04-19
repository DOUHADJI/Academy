<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'domaine',
        "titre_diplome",
        'grade',
        'school_id'
    ];

    public function school() : BelongsTo
    {
        return $this -> belongsTo(School::class);
    }

    public function offers() : HasMany
    {
        return $this -> hasMany(Offer::class, "schedule_id");
    }

    
}