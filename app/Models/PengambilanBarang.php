<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Barang;

class PengambilanBarang extends Model
{
    use HasFactory;
    public $table = "nadya_pengambilan_barangs";
    protected $guarded = [];
  
    public function barang ()
    {
      return $this->belongsTo(Barang::class, 'barang_id');
    }
    public function user ()
    {
      return $this->belongsTo(User::class, 'user_id');
    }
}
