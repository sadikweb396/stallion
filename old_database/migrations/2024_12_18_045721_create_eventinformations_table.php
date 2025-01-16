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
        Schema::create('eventinformations', function (Blueprint $table) {
            $table->id();
            $table->string('heading1');
            $table->string('paragraph1');
            $table->string('heading2');
            $table->String('paragraph2');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eventinformations');
    }
};
