<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Admission extends Model
{
    use HasFactory;

    protected $fillable = [
      "status",
      "schedule_id",
      "user_id",
      "cv",
      "releve_bepc",
      "releve_bac_1",
      "releve_bac_2",
      "lettre_motivation",
      "treated" 
    ];

    public function accepted() 
    {
        if($this -> role == "accepted" )
        {
            return true;
        }

        return false;
    }

    public function refused()
    {
        if($this -> role == "refused" )
        {
            return true;
        }

        return false;
    }
    


    public function schedule():BelongsTo
    {
        return $this -> belongsTo(Schedule::class, "schedule_id");
    }

    public function student():BelongsTo
    {
        return $this -> belongsTo(User::class, "user_id");
    }
}