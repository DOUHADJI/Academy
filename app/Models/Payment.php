<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        "code",
        "status",
        "school_year_id",
        "user_id"
    ];

    public function school_year(): BelongsTo
    {
        return $this -> belongsTo(SchoolYear::class, "school_year_id");
    }

    public function student(): BelongsTo
    {
        return $this -> belongsTo(User::class, "user_id");
    }

    public function inscriptions() : HasMany
    {
        return $this -> hasMany(Inscription::class, "payment_id");
    }

    public function schedule(): BelongsTo
    {
        return $this -> belongsTo(Schedule::class,"schedule_id" );
    }
}