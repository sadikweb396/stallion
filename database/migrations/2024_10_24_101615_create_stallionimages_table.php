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
        Schema::create('stallionimages', function (Blueprint $table) {
            $table->id();
            $table->string('stallion_id');
            $table->string('stallion_name');
            $table->string('stallion_location');
            $table->string('stallion_image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stallionimages');
    }
};
