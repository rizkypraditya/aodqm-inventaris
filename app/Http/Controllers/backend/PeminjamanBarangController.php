<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\PeminjamanBarang;
use App\Models\KeluarBarang;
use App\Models\Barang;
use App\Models\User;

class PeminjamanBarangController extends Controller
{
  public function PinjamBarang()
  {
    $pinjam = PeminjamanBarang::all();
    return view('pinjamBarang.pinjam', compact('pinjam'));
  } //End Method


  public function CreatePinjamBarang()
  {
      $data = Barang::all();
      return view('pinjamBarang.create_pinjam', compact('data'));
  } //End Method

  public function StorePinjamBarang(Request $request)
  {
    $request->validate([
          'tanggal_pinjam' => 'required',
          'jumlah_pinjam' => 'required',
          'deskripsi' => 'required',
          'photo_pinjambarang' => 'required',
      ]);

      $data = new PeminjamanBarang();
      $data->tanggal_pinjam = $request->tanggal_pinjam;
      $data->jumlah_pinjam = $request->jumlah_pinjam;
      $data->deskripsi = $request->deskripsi;
      $data->status = 'Pending';
      $data->user_id = Auth::user()->id;
      $data->barang_id = Barang::find($request->id_barang)->id;
      if ($data->barang->jumlah_barang < $request->jumlah_pinjam) {
        $notification = array(
            'message' => 'Stock barang tidak mencukupi',
            'alert-type' => 'error'
        );

        return redirect()->back()->with($notification);
    }
     
      if ($request->hasFile('photo_pinjambarang')) {
          $file = $request->file('photo_pinjambarang');
          $filename = date('YmdHis') . $file->getClientOriginalName();
          $file->move(public_path('barangpinjam_image'), $filename);
          $data->photo_pinjambarang = $filename;
      }
  
    $data->save();
    $notification = array(
      'message' => 'Permintaan peminjaman berhasil',
      'alert-type' => 'success'
    );
   
    return redirect()->route('pinjam.barang')->with($notification);
  } //End Method

  public function ViewPinjamBarang($id)
  {
      $pinjam = PeminjamanBarang::find($id);
      return view('pinjamBarang.view_pinjam', compact('pinjam'));
  } //End Method

  public function DeletePinjamBarang($id)
  {
    $pinjam = PeminjamanBarang::find($id);
    $pinjam->delete();
    return redirect()->back()->with('success', 'Data Berhasil Dihapus');
  } //End Method



}
