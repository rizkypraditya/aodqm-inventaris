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
        Schema::create('nadya_tambah_barangs', function (Blueprint $table) {
          $table->id();
          $table->unsignedBigInteger('barang_id');
          $table->foreign('barang_id')->references('id')->on('nadya_barangs');
          $table->string('jumlah_tambah');
          $table->string('tanggal_tambah');
          $table->string('resi_pengiriman')->nullable();
          $table->string('pengirim')->nullable();
          $table->string('owner')->nullable();
          $table->string('deskripsi')->nullable();
          $table->string('photo_tambahbarang')->nullable();
          $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tambah');
    }
};
