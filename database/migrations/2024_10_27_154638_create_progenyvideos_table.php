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
        Schema::create('progenyvideos', function (Blueprint $table) {
            $table->id();
            $table->string('progeny_id');
            $table->string('name');
            $table->string('progeny_location');
            $table->string('progeny_set_video');
            $table->string('date');
            $table->string('progeny_video');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('progenyvideos');
    }
};
