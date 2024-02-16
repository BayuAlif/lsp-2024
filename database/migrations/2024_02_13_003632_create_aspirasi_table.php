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
        Schema::create('aspirasi', function (Blueprint $table) {
            $table->id();
            $table->enum('status', ['menunggu', 'proses', 'berhasil','ditolak'])->default('menunggu')->nullable();
            $table->unsignedBigInteger('id_inputAspirasi');
            $table->foreign('id_inputAspirasi')->references('id_pelaporan')->on('input_aspirasi')->onDelete('cascade');
   
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aspirasi');
    }
};
