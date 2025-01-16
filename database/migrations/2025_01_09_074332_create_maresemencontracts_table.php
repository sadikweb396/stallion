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
        Schema::create('maresemencontracts', function (Blueprint $table) {
            $table->id();
            $table->string('stallion_id');
            $table->string('owner_name');
            $table->string('trading-name')->nullable();
            $table->string('postal_address');
            $table->string('suburb');
            $table->string('state');
            $table->string('postcode');
            $table->string('phone');
            $table->string('email');
            $table->string('registration')->nullable();
            $table->integer('membership-number')->nullable();
            $table->string('mare_name');
            $table->string('sire')->nullable();
            $table->string('dam')->nullable();
            $table->string('breeding_type')->nullable();
            $table->string('vet-owner-name')->nullable();
            $table->string('vet-trading-name')->nullable();
            $table->string('vet-postal-address')->nullable();
            $table->string('vet-suburb')->nullable();
            $table->string('vet-state')->nullable();
            $table->string('vet-postcode')->nullable();
            $table->string('vet-phone')->nullable();
            $table->string('vet-email')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('maresemencontracts');
    }
};
