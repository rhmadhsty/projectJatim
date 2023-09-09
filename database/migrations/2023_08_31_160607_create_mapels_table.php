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
        Schema::create('mapel', function (Blueprint $table) {
            $table->id('mapel_id');
            $table->unsignedBigInteger('user_id');
            $table->string('nama_mapel', 20);
            $table->text('jam_mapel');
            // $table->string('guru_mapel');
            $table->timestamps();

            $table->foreign('user_id')->references('user_id')->on('user');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mapel', function(Blueprint $table){
            $table->dropForeign('user_id');
        });
    }
};
