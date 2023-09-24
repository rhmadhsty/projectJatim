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
        Schema::create('siswa', function (Blueprint $table) {
            $table->id('siswa_id');
            $table->unsignedBigInteger('kelas_id');
            $table->string('image-siswa')->nullable();
            $table->string('nis', 20)->unique();
            $table->string('username', 50);
            $table->string('nama', 50);
            $table->date('tanggal_lahir');
            $table->string('email', 70);
            $table->string('password', 80);
            $table->string('telepon', 15);
            $table->boolean('is_active')->default(1)->comment("ketika pertama kali data dibuat status aktifnya true(benar/aktif)");
            $table->timestamps();

            $table->foreign('kelas_id')->references('kelas_id')->on('kelas')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswa');
    }
};
