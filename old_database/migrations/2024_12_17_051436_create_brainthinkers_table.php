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
        Schema::create('brainthinkers', function (Blueprint $table) {
            $table->id();
            $table->string('headin');
            $table->string('paragraph');
            $table->string('image');
            $table->string('facebook_link');
            $table->string('twitter_link');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('brainthinkers');
    }
};
