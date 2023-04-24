<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Inscription extends Model
{
    use HasFactory;

    protected $fillable = [
        "school_year_id",
        "offer_id",
        "payment_id",
        "student_schedule_id"
    ];

    public function offer():BelongsTo
    {
        return $this->belongsTo(Offer::class,"offer_id");   
    } 


}