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
        Schema::create('admissions', function (Blueprint $table) {
            $table->id();
            $table -> string('status') -> default("received");
            $table -> foreignId('schedule_id')-> constrained('schedules');
            $table -> foreignId('user_id')-> constrained('users');
            $table -> boolean("treated") -> default(false);
            $table -> string('releve_bepc');
            $table -> string('releve_bac_1');
            $table -> string('releve_bac_2');
            $table -> string('lettre_motivation');
            $table -> string('cv');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admissions');
    }
};