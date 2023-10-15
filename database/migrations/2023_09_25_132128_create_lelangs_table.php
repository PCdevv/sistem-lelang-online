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
            $table->bigInteger('harga_akhir')->nullable();
            $table->timestamp('tgl_lelang')->default(now());
            $table->enum('status', ['0', 'dibuka', 'ditutup']);

            $table->foreign('id_barang')->references('id_barang')->on('barangs');
            $table->foreign('id_masyarakat')->references('id')->on('users');
            $table->foreign('id_petugas')->references('id')->on('users');
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
