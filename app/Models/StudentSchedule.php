<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StudentSchedule extends Model
{
    use HasFactory;

    protected $fillable = [
        "code",
        "user_id",
        "schedule_id"
    ];

    public function schedule():BelongsTo
    {
        return $this -> belongsTo(Schedule::class, "schedule_id");
    }

    public function user() :BelongsTo
    {
        return $this -> belongsTo(User::class, "user_id");
    }
}