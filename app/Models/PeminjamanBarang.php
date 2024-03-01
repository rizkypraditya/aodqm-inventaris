<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeminjamanBarang extends Model
{
  use HasFactory;
  public $table = "nadya_peminjaman_barangs";
  protected $guarded = [];
  
  // Relasi ke tabel barang
  public function barang ()
  {
    return $this->belongsTo(Barang::class);
  }
  public function user ()
  {
    return $this->belongsTo(User::class);
  }
}


