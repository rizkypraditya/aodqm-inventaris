<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TambahBarang;
use App\Models\MasukBarang;
use Illuminate\Support\Facades\DB;
use App\Models\Barang;

class TambahBarangController extends Controller
{
  public function TambahBarang()
  {
    $tambah = TambahBarang::all();
    return view('admin.masukBarang.tambah_barang', compact('tambah'));
  }//End Method

  public function AddTambah()
  {
    $data = Barang::all();
    return view('admin.masukBarang.add_tambah', compact('data'));
  }//End Method

  public function StoreTambahBarang(Request $request)
  {
    $request->validate([
      'jumlah_tambah' => 'required',
      'tanggal_tambah' => 'required',
      'resi_pengiriman' => 'required',
      'pengirim' => 'required',
      'owner' => 'required',
      'deskripsi' => 'required',
    ]);
    $pid = $request->id;
    $tambahbarang = TambahBarang::find($pid);
    $masukBarang = Barang::find($request->id_barang);
    $jumlah_barang =  $masukBarang->jumlah_barang + $request->jumlah_tambah;
    $masukBarang -> jumlah_barang = $jumlah_barang;
    $masukBarang->save();
    
    $tambahbarang = new TambahBarang();
    $tambahbarang->jumlah_tambah = $request->jumlah_tambah;
    $tambahbarang->tanggal_tambah = $request->tanggal_tambah;
    $tambahbarang->resi_pengiriman = $request->resi_pengiriman;
    $tambahbarang->pengirim = $request->pengirim;
    $tambahbarang->owner = $request->owner;
    $tambahbarang->deskripsi = $request->deskripsi;
    $tambahbarang->barang_id = Barang::find($request->id_barang)->id;
   

    if($request->hasFile('photo_tambahbarang')){
      $file = $request->file('photo_tambahbarang');

      if($tambahbarang->photo_tambahbarang){
        @unlink(public_path('tambah_image/'.$tambahbarang->photo_tambahbarang));
      }
      $filename = date('YmdHis').$file->getClientOriginalName();
      $file->move(public_path('tambah_image'),$filename);
      $tambahbarang->photo_tambahbarang = $filename;
    }

    $tambahbarang->save();

    $notification = array(
      'message' => 'Barang berhasil ditambahkan',
      'alert-type' => 'success'
    );
    return redirect()->route('tambah.barang')->with($notification);
  }//End Method


  public function ViewTambahBarang($id)
  {
    $tambah = TambahBarang::find($id);
    return view('admin.masukBarang.view_tambah', compact('tambah'));
  }//End Method

  public function EditTambahBarang($id)
  {
    $tambahbarang = TambahBarang::findOrFail($id);
    return view('admin.masukBarang.edit_tambah', compact('tambahbarang'));
  }//End Method


  public function UpdateTambahBarang(Request $request)
  {
    $request->validate([
      'jumlah_tambah' => 'required',
      'tanggal_tambah' => 'required',
      'resi_pengiriman' => 'required',
      'pengirim' => 'required',
      'owner' => 'required',
      'deskripsi' => 'required',
    ]);
  
    $tambahbarang = TambahBarang::find($request->id);
    
    $tambahbarang->jumlah_tambah = $request->jumlah_tambah;
    $tambahbarang->tanggal_tambah = $request->tanggal_tambah;
    $tambahbarang->resi_pengiriman = $request->resi_pengiriman;
    $tambahbarang->pengirim = $request->pengirim;
    $tambahbarang->owner = $request->owner;
    $tambahbarang->deskripsi = $request->deskripsi;
    $tambahbarang->barang_id = Barang::find($request->id)->id;
  
    if($request->hasFile('photo_tambahbarang')){
      $file = $request->file('photo_tambahbarang');
  
      if($tambahbarang->photo_tambahbarang){
        @unlink(public_path('tambah_image/'.$tambahbarang->photo_tambahbarang));
      }
      $filename = date('YmdHis').$file->getClientOriginalName();
      $file->move(public_path('tambah_image'),$filename);
      $tambahbarang->photo_tambahbarang = $filename;
    }
  
    $tambahbarang->save();
  
    $notification = array(
      'message' => 'Barang berhasil diupdate',
      'alert-type' => 'success'
    );
    return redirect()->route('tambah.barang')->with($notification);
  }


  public function DeleteTambahBarang($id)
  {
    $tambah = TambahBarang::find($id);
    if($tambah->photo_tambahbarang){
      @unlink(public_path('tambah_image/'.$tambah->photo_tambahbarang));
    }
    $tambah->delete();
    $notification = array(
      'message' => 'Barang berhasil dihapus',
      'alert-type' => 'success'
    );
    return redirect()->route('tambah.barang')->with($notification);
  }

}
