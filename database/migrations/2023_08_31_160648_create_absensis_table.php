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
        Schema::create('absensi', function (Blueprint $table) {
            $table->id('absensi_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('siswa_id');
            $table->enum('status', ['sakit','izin','alfa']);
            $table->text('keterangan', 255);
            $table->timestamps();

            $table->foreign('user_id')->references('user_id')->on('user');
            $table->foreign('siswa_id')->references('siswa_id')->on('siswa');
            // $table->foreign('mapel_id')->references('mapel_id')->on('mapel');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absensi', function(Blueprint $table){
            $table->dropForeign('user_id');
            $table->dropForeign('siswa_id');
            $table->dropForeign('mapel_id');
        });
    }
};