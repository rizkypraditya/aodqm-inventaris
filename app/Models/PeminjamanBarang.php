<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;  
use App\Models\Barang;
use App\Models\KeluarBarang;

class PeminjamanBarang extends Model
{
  
  protected $guarded = [];
  
  public function barang ()
  {
    return $this->belongsTo(Barang::class);
  }
  public function user ()
  {
    return $this->belongsTo(User::class);
  }
}


