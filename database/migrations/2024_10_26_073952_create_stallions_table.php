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
            $table->foreignId('user_id')->references('id')->on('users');
            $table->string('category')->nullable();
            $table->string('name')->nullable();
            $table->string('performance_history')->nullable();
            $table->string('lifetime_story')->nullable();
            $table->string('registration_details')->nullable();
            $table->string('height')->nullable()->nullable();
            $table->string('bred_by')->nullable()->nullable();
            $table->string('owner_story')->nullable();
            $table->string('first_foal_crop_year')->nullable();
            $table->string('professional_trainer')->nullable();
            $table->string('put_semen_available_from')->nullable();
            $table->string('current_performing_discipline')->nullable();
            $table->string('trainer_history')->nullable();
            $table->string('status')->nullable();
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
