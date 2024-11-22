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
        Schema::create('stallions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('owner_id')->references('id')->on('owners');
            $table->foreignId('category_id')->references('id')->on('categories');
            $table->string('name')->nullable();
            $table->string('performancehistory')->nullable();
            $table->string('lifetime_story')->nullable();
            $table->string('registration_details')->nullable();
            $table->string('height')->nullable();
            $table->string('bred_by')->nullable();
            $table->enum('gender', ['male', 'female', 'other'])->nullable(); // Gender field
            $table->timestamps();
        });
    }
  
    /**   
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stallions');
    }
};
