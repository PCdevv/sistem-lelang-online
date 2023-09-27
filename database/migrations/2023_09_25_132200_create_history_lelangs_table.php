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
        Schema::create('history_lelangs', function (Blueprint $table) {
            $table->unsignedBigInteger('id_history')->autoIncrement();
            $table->unsignedBigInteger('id_barang')->nullable();
            $table->unsignedBigInteger('id_lelang')->nullable();
            $table->unsignedBigInteger('id_masyarakat')->nullable();
            $table->unsignedBigInteger('penawaran_harga')->nullable();

            $table->foreign('id_barang')->references('id_barang')->on('barangs')->onDelete('cascade');
            $table->foreign('id_lelang')->references('id_lelang')->on('lelangs')->onDelete('cascade');
            $table->foreign('id_masyarakat')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('history_lelangs');
    }
};
