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
        Schema::create('kehadirans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('siswa_id');
            $table->string('kode', 30)->unique()->default("")->comment("kode untuk pas scan qr code nanti digenerate sesuai datetime now dan covert to int");
            $table->string('nama_lokasi', 50)->default("")->comment("nama lokasi ketika siswa scan");
            $table->string('kordinate', 50)->default("")->comment("kordinate siswa scan");
            $table->string('tanggal', 50)->default("")->comment("tanggal checkin");
            $table->string('waktu', 20)->default("")->comment("waktu checkin");
            $table->boolean('status')->default(1)->comment("jika statusnya 1 itu berarti siswa checkin kalo 0 siswa checkout");
            $table->timestamps();
            
            $table->foreign('siswa_id')->references('siswa_id')->on('siswa')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kehadirans');
    }
};
