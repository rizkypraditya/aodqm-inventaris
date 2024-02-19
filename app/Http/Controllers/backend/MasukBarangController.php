<?php

namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\MasukBarang;
use App\Models\Barang;
use App\Models\TambahBarang;

class MasukBarangController extends Controller
{
    public function RegisterBarang()
    {

      $table = MasukBarang::with('barang')->get();
      return view('admin.masukBarang.register_barang', compact('table'));
    } //End Method

    public function AddRegister()
    {
      return view('admin.masukBarang.add_register');
    } //End Method

    public function StoreRegister(Request $request)
    {
      $request->validate([
        'id_barang' => 'required',
        'serial_number' => 'required',
        'nama_barang' => 'required',
        'jumlah_masuk' => 'required',
        'tanggal_masuk' => 'required',
      ]);
      
      $barang = Barang::where('id', $request->id_barang)->first();

        $barang = new Barang;
        $barang->id_barang = $request->id_barang;
        $barang->serial_number = $request->serial_number;
        $barang->nama_barang = $request->nama_barang;
        $barang->jenis_barang = $request->jenis_barang;
        $barang->lokasi_barang = $request->lokasi_barang;
        $barang->jumlah_barang = $request->jumlah_masuk;
        $barang->save();

      $data = new MasukBarang;
      $data->tanggal_masuk = $request->tanggal_masuk;
      $data->jumlah_masuk = $request->jumlah_masuk;
      $data->deskripsi = $request->deskripsi;
      $data->resi_pengiriman = $request->resi_pengiriman;
      $data->pengirim = $request->pengirim;
      $data->owner = $request->owner;
      $data->barang_id = $barang->id;
      
      if($request->hasFile('photo_barang')){
        $file = $request->file('photo_barang');

        if($data->photo_barang){
          @unlink(public_path('barang_image/'.$data->photo_barang));
        }
        $filename = date('YmdHis').$file->getClientOriginalName();
        $file->move(public_path('barang_image'),$filename);
        $data->photo_barang = $filename;
      } 

      $data->save();
      $notification = array(
        'message' => 'Barang berhasil ditambahkan',
        'alert-type' => 'success'
      );
      return redirect()->route('register.barang')->with($notification);
    }//End Method

    public function ViewRegister($id)
    {
      $item = MasukBarang::find($id);
      return view('admin.masukBarang.view_register', compact('item'));

    } //End Method

    public function EditRegister($id)
    {
      $item = MasukBarang::findOrFail($id);
      return view('admin.masukBarang.edit_register', compact('item'));
    } //End Method

    public function UpdateRegister(Request $request)
    {
      $pid = $request->id;

      $data = MasukBarang::with('barang')->where('id', $pid)->first();
      $barang = $data->barang;

      $barang->id_barang = $request->id_barang;
      $barang->serial_number = $request->serial_number;
      $barang->nama_barang = $request->nama_barang;
      $barang->lokasi_barang = $request->lokasi_barang;
      $barang->jenis_barang = $request->jenis_barang;
      $barang->jumlah_barang = $request->jumlah_masuk;

      $data->tanggal_masuk = $request->tanggal_masuk;
      $data->jumlah_masuk = $request->jumlah_masuk;
      $data->deskripsi = $request->deskripsi;
      $data->resi_pengiriman = $request->resi_pengiriman;
      $data->pengirim = $request->pengirim;
      $data->owner = $request->owner;

      if($request->hasFile('photo_barang')){
        $file = $request->file('photo_barang');

        if($data->photo_barang){
          @unlink(public_path('barang_image/'.$data->photo_barang));
        }
        $filename = date('YmdHis').$file->getClientOriginalName();
        $file->move(public_path('barang_image'),$filename);
        $data->photo_barang = $filename;
      }

      $barang->save();
      $data->save();

      $notification = array(
        'message' => 'Barang berhasil diubah',
        'alert-type' => 'success'
      );
      return redirect()->route('register.barang')->with($notification);
    } //End Method

    public function DeleteRegister($id)
    {
        $barang= MasukBarang::find($id);
        $masuk = Barang::where('id_barang', $id)->first();
    
        if ($barang && $barang->photo_barang) {
            @unlink(public_path('barang_image/' . $barang->photo_barang));
        }
    
        if ($masuk) {
            $masuk->delete();
        }
    
        if ($barang) {
            $barang->delete();
        }
    
        $notification = array(
            'message' => 'Barang berhasil dihapus',
            'alert-type' => 'success'
        );
    
        return redirect()->route('register.barang')->with($notification);
    }
  
    

}

