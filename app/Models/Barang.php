<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function masukbarang()
    {
        return $this->belongsTo(MasukBarang::class);
    }

    public function peminjaman ()
    {
      return $this->belongsTo(PeminjamanBarang::class);
    }
    public function pengembalian ()
    {
      return $this->belongsTo(PengembalianBarang::class);
    }
    public function pengambilan ()
    {
      return $this->belongsTo(PengambilanBarang::class);
    }
    public function tambah ()
    {
      return $this->belongsTo(TambahBarang::class);
    }
}
