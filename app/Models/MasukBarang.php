<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasukBarang extends Model
{
    use HasFactory;
    public $table = "nadya_masuk_barangs";
    protected $guarded = [];
    
    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id');
    }
    

}
