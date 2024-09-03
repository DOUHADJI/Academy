<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Faculty extends Model
{
    use HasFactory;

    public function director() : BelongsTo
    {
        return $this->belongsTo(User::class, "director_id");
    }

    public function departments() : HasMany
    {
        return $this->hasMany(Department::class, "faculty_id");
    }
}
