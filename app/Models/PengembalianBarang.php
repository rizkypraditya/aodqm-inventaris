<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Barang;

class PengembalianBarang extends Model
{
    use HasFactory;
    public $table = "nadya_pengembalian_barangs";
    protected $guarded = [];
  
    public function barang ()
    {
      return $this->belongsTo(PeminjamanBarang::class, 'barang_id');
    }

    public function masukbarang ()
    {
      return $this->belongsTo(Barang::class);
    }

    public function user ()
    {
      return $this->belongsTo(User::class, 'user_id');
    }
}
