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
        Schema::create('petugas_fasilitas', function (Blueprint $table) {
            $table->increments('petugas_id'); // auto-increment
            $table->unsignedInteger('fasilitas_id')->nullable(); // FK
            $table->unsignedInteger('petugas_warga_id')->nullable(); // FK
            $table->string('peran', 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('petugas_fasilitas');
    }
};
