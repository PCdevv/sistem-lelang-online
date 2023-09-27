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
        Schema::create('lelangs', function (Blueprint $table) {
            $table->unsignedBigInteger('id_lelang')->autoIncrement();
            $table->unsignedBigInteger('id_barang')->nullable();
            $table->unsignedBigInteger('id_masyarakat')->nullable();
            $table->unsignedBigInteger('id_petugas')->nullable();
            $table->bigInteger('harga_akhir');
            $table->timestamp('tgl_lelang')->default(now());
            $table->enum('startus', ['0', 'dibuka', 'ditutup']);

            $table->foreign('id_barang')->references('id_barang')->on('barangs')->onDelete('cascade');
            $table->foreign('id_masyarakat')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_petugas')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lelangs');
    }
};
