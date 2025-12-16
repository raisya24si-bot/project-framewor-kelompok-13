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
       Schema::create('peminjaman_fasilitas', function (Blueprint $table) {
    $table->id('pinjam_id');

    // Kalau tabel fasilitas pakai fasilitas_id (bukan id), pakai foreignId + references
    $table->unsignedBigInteger('fasilitas_id');
    $table->unsignedBigInteger('warga_id');

    $table->date('tanggal_mulai');
    $table->date('tanggal_selesai');
    $table->string('tujuan', 255)->nullable();

    $table->string('status', 30)->default('pending');
    $table->decimal('total_biaya', 12, 2)->default(0);

    $table->timestamps();

    $table->foreign('fasilitas_id')->references('fasilitas_id')->on('fasilitas_umum')->cascadeOnDelete();
    $table->foreign('warga_id')->references('id')->on('users')->cascadeOnDelete();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjaman_fasilitas');
    }
};
