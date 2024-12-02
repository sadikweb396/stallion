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
        Schema::create('pedigrees', function (Blueprint $table) {
            $table->id();
            $table->string('stallion_id');
            $table->string('stallionname');
            $table->string('stallionregistration');
            $table->string('sirename1');
            $table->string('sirelink1');
            $table->string('sireregistration1');
            $table->string('sirename2');
            $table->text('sirelink2'); 
            $table->string('sireregistration2');
            $table->string('sirename3');
            $table->text('sirelink3');
            $table->string('sireregistration3');
            $table->string('sirename4');
            $table->text('sirelink4');
            $table->string('sireregistration4');
            $table->string('sirename5');
            $table->text('sirelink5');
            $table->string('sireregistration5');
            $table->string('sirename6');
            $table->text('sirelink6');
            $table->string('sireregistration6');
            $table->string('sirename7');
            $table->text('sirelink7');
            $table->string('sireregistration7');
            $table->string('damname1');
            $table->text('damlink1');
            $table->string('damregistration1');
            $table->string('damname2');
            $table->text('damlink2');
            $table->string('damregistration2');
            $table->string('damname3');
            $table->text('damlink3');
            $table->string('damregistration3');
            $table->string('damname4');
            $table->text('damlink4');
            $table->string('damregistration4');
            $table->string('damname5');
            $table->text('damlink5');
            $table->string('damregistration5');
            $table->string('damname6');
            $table->text('damlink6');
            $table->string('damregistration6');
            $table->string('damname7');
            $table->text('damlink7');
            $table->string('damregistration7');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedigrees');
    }
};
