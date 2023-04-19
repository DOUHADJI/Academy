<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table ->string('code');
            $table -> string('intitule');
            $table -> integer('credit');
            $table -> string('nature');
            $table -> string('semestre');
            $table -> string('semestre_academique');
            $table -> string('grade');
            $table -> foreignId('schedule_id') -> constrained('schedules');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offers');
    }
};