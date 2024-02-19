<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\PengambilanBarang;
use App\Models\Barang;
use App\Models\User;

class PengambilanBarangController extends Controller
{
   public function AmbilBarang()
   {
     $ambil = PengambilanBarang::all();
     return view('ambilBarang.ambil', compact('ambil'));
   } //End Method

    public function CreateAmbilBarang()
    {
      $data = Barang::all();
      $user = User::all();
      return view('ambilBarang.create_ambil', compact('data', 'user'));
    } //End Method

    public function StoreAmbilBarang(Request $request)
    {
      $request->validate([
        'id_barang' => 'required',
        'jumlah_ambil' => 'required',
        'tanggal_ambil' => 'required',
        'deskripsi' => 'required',
        'photo_ambilbarang' => 'required',
      ]);

      $data = new PengambilanBarang;
      $data->jumlah_ambil = $request->jumlah_ambil;
      $data->tanggal_ambil = $request->tanggal_ambil;
      $data->deskripsi = $request->deskripsi;
      $data->status = 'Pending';
      $data->user_id = Auth::user()->id;
      $data->barang_id = Barang::find($request->id_barang)->id;
      if ($data->barang->jumlah_barang < $request->jumlah_ambil) {
        $notification = array(
            'message' => 'Stock barang tidak mencukupi',
            'alert-type' => 'error'
        );

        return redirect()->back()->with($notification);
    }

    if($request->file('photo_ambilbarang')){
      $file = $request->file('photo_ambilbarang');
      @unlink(public_path('barangambil_image/'.$data->photo_ambilbarang));
      $filename = date('YmdHis').$file->getClientOriginalName();
      $file->move(public_path('barangambil_image'),$filename);
      $data['photo_ambilbarang'] = $filename;
    }

      $data->save();
      $notification = array(
        'message' => 'Permintaan Ambil Barang berhasil',
        'alert-type' => 'success'
      );
      return redirect()->route('ambil.barang')->with($notification);
    } //End Method

    public function ViewAmbilBarang($id)
    {
      $ambil = PengambilanBarang::find($id);
      return view('ambilBarang.view_ambil', compact('ambil'));
    } //End Method

    public function EditAmbilBarang($id)
    {
      $ambil = PengambilanBarang::find($id);
      return view('ambilBarang.edit_ambil', compact('ambil'));
    } //End Method

    public function UpdateAmbilBarang(Request $request){

      $pid = $request->id;
      $data = PengambilanBarang::with('barang')->where('id', $pid)->first();
      $data->tanggal_ambil = $request->tanggal_ambil;
      $data->deskripsi = $request->deskripsi;
      $data->jumlah_ambil= $request->jumlah_ambil;
        if ($data->barang->jumlah_barang < $request->jumlah_ambil) {
          $notification = array(
              'message' => 'Stock barang tidak mencukupi',
              'alert-type' => 'error'
          );
  
          return redirect()->back()->with($notification);
      }
  
  
      if ($request->hasFile('photo_ambilbarang')) {
        $file = $request->file('photo_ambilbarang');
        $filename = date('YmdHis') . $file->getClientOriginalName();
        $file->move(public_path('barangambil_image'), $filename);
        $data->photo_ambilbarang = $filename;
    }
      $data->save();
      $notification = array(
          'message' => 'Data Berhasil Diupdate',
          'alert-type' => 'success'
      );
      return redirect()->route('ambil.barang')->with($notification);
    } //End Method
  


    public function DeleteAmbilBarang($id)
    {
      $ambil = PengambilanBarang::find($id);
      $ambil->delete();
      return redirect()->back()->with('success', 'Data Berhasil Dihapus');
    }
}
