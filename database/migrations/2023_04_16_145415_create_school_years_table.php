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
        Schema::create('school_years', function (Blueprint $table) {
            $table->id();
            $table -> date("start");
            $table -> date("end");
            
            $table -> date("extend_start")->nullable();
            $table -> date("extend_end")->nullable();
            
            $table -> date("inscription_start");
            $table -> date("inscription_end");
            
            $table -> date("extend_inscription_start")->nullable();
            $table -> date("extend_inscription_end")->nullable();
            
            $table -> date("harmattan_start");
            $table -> date("harmattan_end");  
            
            $table -> date("hollydays_harmattan_start");
            $table -> date("hollydays_harmattan_end");
            
            $table -> date("harmattan_exams_start");
            $table -> date("harmattan_exams_end");
            
             
           
            $table -> date("mousson_start");
            $table -> date("mousson_end");
            
            $table -> date("hollydays_mousson_start");
            $table -> date("hollydays_mousson_end");
            
            $table -> date("mousson_exams_start");
            $table -> date("mousson_exams_end");
            
            $table->timestamps();
        });

        /**
         * Une table payement qui contient l'étudiant qui a payé, l'année scolaire
         * Une table inscription qui contient l'année scolaire, la matière dans laquelle l'étudiant s'inscrit,
         * et la reférence du payement effectué
         */
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('school_years');
    }
};