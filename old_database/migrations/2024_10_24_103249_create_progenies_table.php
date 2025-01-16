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
        Schema::create('progenies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('stallion_id');
            $table->string('progeny_name');
            $table->string('name');
            $table->string('sale');
            $table->string('sold');
            $table->string('date_of_birth');
            $table->string('gender');
            $table->string('color');
            $table->string('registration_number');
            $table->string('breeder');
            $table->string('performace_history');
            $table->string('trainer');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('progenies');
    }
};
