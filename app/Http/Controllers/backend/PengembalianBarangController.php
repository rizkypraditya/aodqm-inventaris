<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\PengembalianBarang;
use App\Models\PeminjamanBarang;
use App\Models\Barang;
use App\Models\User;

class PengembalianBarangController extends Controller
{
  public function KembaliBarang()
  {
    $kembali = PengembalianBarang::all();
    return view('kembaliBarang.kembali', compact('kembali'));
  } //End Method

  public function CreateKembaliBarang(){
    $data = PeminjamanBarang::where('status', 'approved')->get();
    $user = User::all();
    return view('kembaliBarang.create_kembali', compact('data', 'user'));
  } //End Method

  public function ViewKembaliBarang($id)
  {
    $kembali = PengembalianBarang::find($id);
    return view('kembaliBarang.view_kembali', compact('kembali'));
  } //End Method

  public function DeleteKembaliBarang($id)
  {
    $kembali = PengembalianBarang::find($id);
    $kembali->delete();
    $notification = array(
      'message' => 'Data Pengembalian Berhasil Dihapus',
      'alert-type' => 'success'
  );
    return redirect()->route('kembali.barang')->with($notification);
  }// End Method

  public function StoreKembaliBarang(Request $request)
  {
    $request->validate([
      'tanggal_kembali' => 'required',
      'jumlah_kembali' => 'required',
      'deskripsi' => 'required',
      'photo_kembalibarang' => 'required',
  ]);


  $data = new PengembalianBarang();
  $data->tanggal_kembali = $request->tanggal_kembali;
  $data->jumlah_kembali = $request->jumlah_kembali;
  $data->deskripsi = $request->deskripsi;
  $data->status = 'Pending';
  $data->user_id = Auth::user()->id;
  $data->barang_id = PeminjamanBarang::find($request->id_barang)->id;
  if ( $request->jumlah_kembali > $data->barang->jumlah_pinjam) {
    $notification = array(
        'message' => 'Barang yang dikembalikan melebihi jumlah yang dipinjam',
        'alert-type' => 'error'
    );

    return redirect()->back()->with($notification);
}
 
  if ($request->hasFile('photo_kembalibarang')) {
      $file = $request->file('photo_kembalibarang');
      $filename = date('YmdHis') . $file->getClientOriginalName();
      $file->move(public_path('barangkembali_image'), $filename);
      $data->photo_kembalibarang = $filename;
  }

$data->save();
$notification = array(
  'message' => 'Permintaan Pengembalian Berhasil',
  'alert-type' => 'success'
);

return redirect()->route('kembali.barang')->with($notification);
  } //End Method
     
}
