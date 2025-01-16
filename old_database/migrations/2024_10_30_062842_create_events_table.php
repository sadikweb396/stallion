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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('event_name');
            $table->string('event_type');
            $table->string('event_description');
            $table->string('event_location');
            $table->string('start_date');
            $table->string('end_date');
            $table->string('organisation_name');
            $table->string('association_hosting_event');
            $table->string('event_link');
            $table->string('link_to_program');
            $table->string('facebook_link');
            $table->string('link_to_nominate');
            $table->string('mark_event_prestigious');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
