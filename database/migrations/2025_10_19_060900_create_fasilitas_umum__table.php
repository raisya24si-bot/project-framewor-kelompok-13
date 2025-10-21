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
    Schema::create('fasilitas_umum', function (Blueprint $table) {
    $table->increments('fasilitas_id');
    $table->string('nama');
    $table->enum('jenis', ['Aula', 'Lapangan','Mesjid', 'Balai', 'Lainnya']); // aula/lapangan/dll
    $table->string('alamat');
    $table->enum('rt', ['1', '2', '3', '4', '5', '6', '7', '8', '9']);
    $table->enum('rw', ['1', '2', '3', '4', '5', '6', '7', '8', '9']);
    $table->integer('kapasitas');
    $table->text('deskripsi')->nullable();
    $table->string('foto')->nullable(); // path media
    $table->string('sop')->nullable();  // path SOP
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fasilitas_umum_');
    }
};
