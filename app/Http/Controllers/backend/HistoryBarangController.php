<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\MasukBarang;
use App\Models\TambahBarang;
use App\Models\KeluarBarang;
use App\Models\PengembalianBarang;
use App\Models\PeminjamanBarang;
use App\Models\PengambilanBarang;

class HistoryBarangController extends Controller
{
    public function History()
    {  
      $barang = Barang::all();
      $pinjam = PeminjamanBarang::all();
      $ambil = PengambilanBarang::all();
      $kembali = PengembalianBarang::all();
      $tambah = TambahBarang::all();
      $masuk = MasukBarang::all();
      return view('admin.history.history_tes',compact('barang', 'pinjam', 'ambil', 'kembali'));
    }
    public function Search(Request $request)
    {
        $search = $request->search;
        $barang = Barang::where('nama_barang', 'LIKE', '%' . $search . '%')
                  ->orWhere('id', 'LIKE', '%' . $search . '%')
                  ->orWhere('serial_number', 'LIKE', '%' . $search . '%')
                  ->orWhere('id_barang', 'LIKE', '%' . $search . '%')
                  ->get();

        $tambah = TambahBarang::whereIn('barang_id', $barang->pluck('id'))
                  ->get();
        $masuk = MasukBarang::whereIn('barang_id', $barang->pluck('id'))
                  ->get();
        $pinjam = PeminjamanBarang::where('status', 'approved')
                  ->whereIn('barang_id', $barang->pluck('id'))
                  ->get();
        $ambil = PengambilanBarang::where('status', 'approved')
                  ->whereIn('barang_id', $barang->pluck('id'))
                  ->get();
        $kembali = PengembalianBarang::where('status', 'approved')
                  ->whereIn('barang_id', $barang->pluck('id'))
                  ->get();

        foreach ($ambil as $item) {
            $item->activity_type = 'Barang diambil';
            $item->tanggal = $item->tanggal_ambil;
            $item->jumlah = $item->jumlah_ambil;
            $item->user = $item->user->name;
        }

        foreach ($kembali as $item) {
            $item->activity_type = 'Barang dikembalikan';
            $item->tanggal = $item->tanggal_kembali;
            $item->jumlah = $item->jumlah_kembali;
            $item->user = $item->user->name;

        }

        foreach ($pinjam as $item) {
            $item->activity_type = 'Barang dipinjam';
            $item->tanggal = $item->tanggal_pinjam;
            $item->jumlah = $item->jumlah_pinjam;
            $item->user = $item->user->name;
        }

        foreach ($tambah as $item) {
            $item->activity_type = 'Barang ditambahkan';
            $item->tanggal = $item->tanggal_tambah;
            $item->jumlah = $item->jumlah_tambah;
        }

        foreach ($masuk as $item) {
            $item->activity_type = 'Register Barang';
            $item->tanggal = $item->tanggal_masuk;
            $item->jumlah = $item->jumlah_masuk;
        }


        $history = $barang->concat($pinjam)->concat($kembali)->concat($tambah)->concat($masuk)->concat($ambil)
                ->sortByDesc('tanggal')
                ->all();

        return view('admin.history.history', compact('barang','pinjam','ambil','kembali','tambah','masuk', 'history'));
    }
    
}
