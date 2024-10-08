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
        Schema::create('_berkas_lampiran', function (Blueprint $table) {
            $table->id();
            $table->string('ID_Anak');
            $table->string('KartuKeluarga');
            $table->string('AktaKelahiran');
            $table->string('SuketTidakMampu');
            $table->string('KIP');
            $table->string('KIS');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_berkas_lampiran');
    }
};
