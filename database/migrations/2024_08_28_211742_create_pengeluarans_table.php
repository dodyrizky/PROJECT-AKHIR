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
        Schema::create('pengeluarans', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_pengeluaran'); // Tanggal pengeluaran
            $table->decimal('nominal', 10, 2); // Jumlah pengeluaran
            $table->text('keterangan')->nullable(); // Deskripsi
            $table->text('bukti_pembayaran')->nullable(); // Deskripsi
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengeluarans');
    }
};
