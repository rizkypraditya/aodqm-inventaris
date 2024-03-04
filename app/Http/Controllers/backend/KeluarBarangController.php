<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\KeluarBarang;
use App\Models\PeminjamanBarang;
use App\Models\PengambilanBarang;
use App\Models\PengembalianBarang;
use App\Models\Barang;
use App\Exports\PeminjamanExport;
use App\Exports\PengambilanExport;
use App\Exports\PengembalianExport;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\WithHeadings;

class KeluarBarangController extends Controller
{
  public function PeminjamanBarang()
  {
    $pinjam = PeminjamanBarang::all();
    return view('admin.keluarBarang.peminjaman_barang', compact('pinjam'));
  }
  public function ViewPeminjaman($id)
  {
    $pinjam = PeminjamanBarang::find($id);
    return view('admin.keluarBarang.view_peminjaman', compact('pinjam'));
  }
  
  public function AcceptRequest($id)
  {
      $peminjamanBarang = PeminjamanBarang::find($id);
  
      if ($peminjamanBarang) {
          $peminjamanBarang->status = 'approved';
          $peminjamanBarang->save();
  
          $masukBarang = Barang::find($peminjamanBarang->barang_id);
  
          if ($masukBarang) {
              $masukBarang->jumlah_barang = $masukBarang->jumlah_barang - $peminjamanBarang->jumlah_pinjam;
              $masukBarang->save();
  
              $notification = array(
                  'message' => 'Peminjaman Barang Berhasil di Approve',
                  'alert-type' => 'success'
              );
  
              return redirect()->back()->with($notification);
          } else {
              $notification = array(
                  'message' => 'Barang tidak ditemukan',
                  'alert-type' => 'error'
              );
  
              return redirect()->back()->with($notification);
          }
      } else {
          $notification = array(
              'message' => 'Peminjaman Barang tidak ditemukan',
              'alert-type' => 'error'
          );
  
          return redirect()->back()->with($notification);
      }
  }

  public function RejectRequest($id)
  {
      $peminjamanBarang = PeminjamanBarang::find($id);

      if ($peminjamanBarang) {
          $peminjamanBarang->status = 'reject';
          $peminjamanBarang->save();

          $notification = array(
              'message' => 'Peminjaman Barang Berhasil di Reject',
              'alert-type' => 'error'
          );

          return redirect()->back()->with($notification);
      } else {
          $notification = array(
              'message' => 'Peminjaman Barang tidak ditemukan',
              'alert-type' => 'error'
          );

          return redirect()->back()->with($notification);
      }
  }

  public function PengembalianBarang()
  {
    $kembali = PengembalianBarang::all();
    return view('admin.keluarBarang.pengembalian_barang', compact('kembali'));
  }

  public function ViewPengembalian($id)
  {
    $kembali = PengembalianBarang::find($id);
    return view('admin.keluarBarang.view_pengembalian', compact('kembali'));
  }

public function AcceptKembali($id)
{
    $kembaliBarang = PengembalianBarang::find($id);

    if ($kembaliBarang) {
        $kembaliBarang->status = 'approved';
        $kembaliBarang->save();

        $masukBarang = Barang::find($kembaliBarang->barang_id);

        if ($masukBarang) {
            $peminjamanBarang = PeminjamanBarang::where('barang_id', $kembaliBarang->barang_id)->first();

            if ($peminjamanBarang && $kembaliBarang->jumlah_kembali <= $peminjamanBarang->jumlah_pinjam) {
                $masukBarang->jumlah_barang = $masukBarang->jumlah_barang + $kembaliBarang->jumlah_kembali;
                $masukBarang->save();

                $peminjamanBarang->jumlah_pinjam = $peminjamanBarang->jumlah_pinjam - $kembaliBarang->jumlah_kembali;
                $peminjamanBarang->save();

                $notification = array(
                    'message' => 'Pengembalian Barang Berhasil di Approve',
                    'alert-type' => 'success'
                );

                return redirect()->back()->with($notification);
            } else {
                $notification = array(
                    'message' => 'Jumlah barang yang dikembalikan melebihi jumlah yang dipinjam',
                    'alert-type' => 'error'
                );

                return redirect()->back()->with($notification);
            }
        } else {
            $notification = array(
                'message' => 'Barang tidak ditemukan',
                'alert-type' => 'error'
            );

            return redirect()->back()->with($notification);
        }
    } else {
        $notification = array(
            'message' => 'Pengembalian Barang tidak ditemukan',
            'alert-type' => 'error'
        );

        return redirect()->back()->with($notification);
    }
}

  public function RejectKembali($id)
  {
      $kembaliBarang = PengembalianBarang::find($id);
  
      if ($kembaliBarang) {
          $kembaliBarang->status = 'reject';
          $kembaliBarang->save();
  
          $notification = array(
              'message' => 'Pengembalian Barang Berhasil di Reject',
              'alert-type' => 'error'
          );
  
          return redirect()->back()->with($notification);
      } else {
          $notification = array(
              'message' => 'Pengembalian Barang tidak ditemukan',
              'alert-type' => 'error'
          );
  
          return redirect()->back()->with($notification);
      }
  }


  public function PengambilanBarang()
  {
    $ambil = PengambilanBarang::all();
    return view('admin.keluarBarang.pengambilan_barang', compact('ambil'));
  }

  public function ViewPengambilan($id)
  {
    $ambil = PengambilanBarang::find($id);
    return view('admin.keluarBarang.view_pengambilan', compact('ambil'));
  }

  public function AcceptAmbil($id)
  {
    $ambilBarang = PengambilanBarang::find($id);

    if ($ambilBarang) {
        $ambilBarang->status = 'approved';
        $ambilBarang->save();

        $masukBarang = Barang::find($ambilBarang->barang_id);

        if ($masukBarang) {
            $masukBarang->jumlah_barang = $masukBarang->jumlah_barang - $ambilBarang->jumlah_ambil;
            $masukBarang->save();

            $notification = array(
                'message' => 'Pengambilan Barang Berhasil di Approve',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
        } else {
            $notification = array(
                'message' => 'Barang tidak ditemukan',
                'alert-type' => 'error'
            );

            return redirect()->back()->with($notification);
        }
    } else {
        $notification = array(
            'message' => 'Pengambilan Barang tidak ditemukan',
            'alert-type' => 'error'
        );

        return redirect()->back()->with($notification);
    }
  }



  public function RejectAmbil($id)
  {
    $ambilBarang = PengambilanBarang::find($id);

    if ($ambilBarang) {
        $ambilBarang->status = 'reject';
        $ambilBarang->save();

        $notification = array(
            'message' => 'Pengambilan Barang Berhasil di Reject',
            'alert-type' => 'error'
        );

        return redirect()->back()->with($notification);
    } else {
        $notification = array(
            'message' => 'Pengambilan Barang tidak ditemukan',
            'alert-type' => 'error'
        );

        return redirect()->back()->with($notification);
    }
  }
  public function PeminjamanBarangexport()
  {
    return Excel::download(new PeminjamanExport, 'peminjaman barang.xlsx');
  }
  public function PengambilanBarangexport()
  {
    return Excel::download(new PengambilanExport, 'pengambilan barang.xlsx');
  }
  public function PengembalianBarangexport()
  {
    return Excel::download(new PengembalianExport, 'pengembalian barang.xlsx');
  }

}
