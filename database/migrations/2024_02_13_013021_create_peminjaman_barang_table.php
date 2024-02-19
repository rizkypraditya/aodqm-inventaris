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
        Schema::create('peminjaman_barangs', function (Blueprint $table) {
          $table->id();
          $table->string('tanggal_pinjam')->nullable(false);
          $table->unsignedBigInteger('barang_id');
          $table->foreign('barang_id')->references('id')->on('barangs');
          $table->unsignedBigInteger('user_id');
          $table->foreign('user_id')->references('id')->on('users');
          $table->integer('jumlah_pinjam')->default(0)->nullable(false);
          $table->string('deskripsi')->nullable();
          $table->enum('status',['approved','pending', 'reject'])->default('pending');
          $table->string('photo_pinjambarang')->nullable();
          $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjaman');
    }
};

