<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('student_information', function (Blueprint $table) {
            $table->id();
            $table->string("nom");
            $table->string("prenom");
            $table->string("lieu_naissance");
            $table->date("date_naissance");
            $table->string("pays_naissance");
            $table->string("nationalite");
            $table->string("sexe");
            $table->string("situation_famille");
            $table->string("adresse");
            $table->string("ville");
            $table->string("quartier");
            $table->string("telephone");
            $table->string("annee_bac");
            $table->string("mention_bac"); 
            $table->string("serie_bac");
            $table->string("pays_bac");
            $table->string("num_table_bac");
            $table->string("grade");
            $table->string("boite_postal")->nullable();
            $table->string("nom_jeune_fille")->nullable();
            $table->foreignId('user_id')->constrained("users");
            $table -> string("avatar");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_informations');
    }
};