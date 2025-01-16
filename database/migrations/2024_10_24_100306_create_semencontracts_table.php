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
        Schema::create('semencontracts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('stallion_id');
            $table->string('chilled_semen')->nullable();
            $table->string('chilled_semen_lfg')->nullable();
            $table->string('chilled_semen_price')->nullable();
            $table->string('frozen_semen')->nullable();
            $table->string('frozen_semen_lfg')->nullable();
            $table->string('frozen_semen_price')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('semencontracts');
    }
};
