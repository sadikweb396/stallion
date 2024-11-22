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
        Schema::create('vetdetails', function (Blueprint $table) {
            $table->id();
            $table->foreignId('stallion_id');
            $table->string('name_of_clinic');
            $table->string('address');
            $table->string('vet_name');
            $table->string('phone');
            $table->string('email');
            $table->string('clinic_number');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vetdetails');
    }
};
