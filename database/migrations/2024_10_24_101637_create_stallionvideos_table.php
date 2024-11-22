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
        Schema::create('stallionvideos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('stallion_id');
            $table->string('stallion_name');
            $table->string('stallion_location');
            $table->string('stallion_video');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stallionvideos');
    }
};
