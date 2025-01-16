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
        Schema::create('servicedetails', function (Blueprint $table) {
            $table->id();
            $table->string('serviceid');
            $table->string('bannerimage');
            $table->string('heading1');
            $table->string('paragraph1');
            $table->string('heading2');
            $table->string('paragraph2');
            $table->string('image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servicedetails');
    }
};
