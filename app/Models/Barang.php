<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    public $table = "nadya_barangs";
    protected $guarded = [];

    public function masukbarang()
    {
        return $this->hasMany(MasukBarang::class);
    }

    public function peminjaman ()
    {
      return $this->hasMany(PeminjamanBarang::class);
    }
    public function pengembalian ()
    {
      return $this->hasMany(PengembalianBarang::class);
    }
    public function pengambilan ()
    {
      return $this->hasMany(PengambilanBarang::class);
    }
    public function tambah ()
    {
      return $this->hasMany(TambahBarang::class);
    }
}
