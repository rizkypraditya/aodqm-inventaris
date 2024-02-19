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
        Schema::create('masuk_barangs', function (Blueprint $table) {
          $table->id();
          $table->unsignedBigInteger('barang_id');
          $table->foreign('barang_id')->references('id')->on('barangs');
          $table->date('tanggal_masuk')->nullable();
          $table->string('jumlah_masuk')->nullable();
          $table->string('resi_pengiriman')->nullable();
          $table->string('pengirim')->nullable();
          $table->string('owner')->nullable();
          $table->string('deskripsi')->nullable();
          $table->string('photo_barang')->nullable();
          $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('masuk');
    }
};
