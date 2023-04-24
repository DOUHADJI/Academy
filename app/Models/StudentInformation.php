<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StudentInformation extends Model
{
    use HasFactory;

    protected $fillable = [
            "nom" ,
            "prenom" ,
            "lieu_naissance" ,
            "date_naissance" ,
            "pays_naissance" ,
            "nationalite" ,
            "sexe" ,
            "situation_famille" ,
            "adresse",
            "ville" ,
            "quartier" ,
            "telephone" ,
            "annee_bac" ,
            "mention_bac" ,
            "serie_bac" ,
            "pays_bac" ,
            "num_table_bac" ,
            "grade" ,
            "user_id",
            "nom_jeune_fille",
            "boite_postal",
            "avatar"
  
    ];

    public function student() : BelongsTo
    {
        return $this -> belongsTo(User::class,"user_id" );
    }
}