<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Barang;
use App\Models\MasukBarang;
use App\Models\TambahBarang;
use App\Models\KeluarBarang;
use App\Models\PengembalianBarang;
use App\Models\PeminjamanBarang;
use App\Models\PengambilanBarang;
use App\Models\ListBarang;

use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{

    public function AdminDashboard()
    {
        // data masukbarang terbaru
        $masukbarang = MasukBarang::orderBy('created_at', 'desc')->limit(2)->get();
        $tambahbarang = TambahBarang::with('barang')->orderBy('created_at', 'desc')->limit(2)->get();

        //data keluarbarang terbaru
        $pinjambarang = PeminjamanBarang::where('status', 'Approved')->orderBy('created_at', 'desc')->limit(2)->get();
        $ambilbarang = PengambilanBarang::where('status', 'Approved')->orderBy('created_at', 'desc')->limit(2)->get();
        $kembalibarang = PengembalianBarang::where('status', 'Approved')->orderBy('created_at', 'desc')->limit(2)->get();

        //totaluser
        $totalUser = User::count();
      
        return view('admin.index')->with(compact( 'totalUser', 'pinjambarang', 'ambilbarang', 'kembalibarang', 'masukbarang', 'tambahbarang'));
    } //End Method
    
    
    public function AdminLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin/login');   
    } //End Method

    public function AdminLogin(Request $request)
    {
      Auth::guard('web')->logout();

      $request->session()->invalidate();

      $request->session()->regenerateToken();

      return redirect('login');  
    } //End Method

    public function AdminProfile()
    {
      $id = Auth::user()->id;
      $profileAdmin = User::find($id);
      return view('admin.admin_profile', compact('profileAdmin'));

    } //End Method

    public function AdminProfileStore(Request $request)
    {
      $id = Auth::user()->id;
      $data = User::find($id);
      $data->name = $request->name;
      $data->username = $request->username;
      $data->email = $request->email;
      $data->phone = $request->phone;
      $data->mitra = $request->mitra;

      if($request->file('photo')){
        $file = $request->file('photo');
        @unlink(public_path('admin_image/'.$data->photo));
        $filename = date('YmdHis').$file->getClientOriginalName();
        $file->move(public_path('admin_image'),$filename);
        $data['photo'] = $filename;
      }
      $data->save();
      $notification = array(
        'message' => 'Profil Berhasil Diubah',
        'alert-type' => 'success'
      );
      return redirect()->route('admin.profile')->with($notification);
    } //End Method

    public function AdminChangePassword()
    {
      $id = Auth::user()->id;
      $profileAdmin = User::find($id);
      return view('admin.admin_change_password', compact('profileAdmin'));
    } //End Method

    public function AdminUpdatePassword(Request $request)
    {
      //Validation
      $request->validate([
        'old_password' => 'required',
        'new_password' => 'required|confirmed'
      ]);

      //Match Old Password
      if(!Hash::check($request->old_password, Auth::user()->password)){
        
        $notification = array(
          'message' => 'Password Lama Salah!',
          'alert-type' => 'error'
        );
        return back()->with($notification);
      }

      //Update New Password
      User::whereId(auth()->user()->id)->update(['password' => Hash::make($request->new_password)]);
      
      $notification = array(
        'message' => 'Password Berhasil Diubah',
        'alert-type' => 'success'
      );

      return back()->with($notification);
    } //End Method

    public function AdminUser()
    {
      $table = User::oldest()->get();
      return view('admin.user.admin_user', compact('table'));
    } //End Method

    public function AddUser()
    {
      return view('admin.user.add_user');
    } //End Method

    public function StoreUser(Request $request)
    {
      $request->validate([
        'email' => 'required|email|unique:users',
        'name' => 'required',
        'mitra' => 'required',
        'phone' => 'required',
        'role' => 'required',
        'photo' => 'required',
      ]);

      $data = new User;
      $data->email = $request->email;
      $data->username = $request->username;
      $data->name = $request->name;
      $data->mitra = $request->mitra;
      $data->phone = $request->phone;
      $data->role = $request->role;
      $data->password = Hash::make('1234');
      
      if($request->hasFile('photo')){
        $file = $request->file('photo');
        $filename = date('YmdHis').$file->getClientOriginalName();
        $file->move(public_path('admin_image'),$filename);
        $data->photo = $filename;
      } 

      $data->save();
      $notification = array(
        'message' => 'User berhasil ditambahkan',
        'alert-type' => 'success'
      );
      return redirect()->route('admin.user')->with($notification);
    } //End Method
    public function UserView($id)
    {
      $detailUser = User::find($id);
      return view('admin.user.view_user', compact('detailUser'));

    } //End Method
    public function UserDelete($id)
    {
     User::findOrFail($id)->delete();
      $notification = array(
        'message' => 'User berhasil dihapus',
        'alert-type' => 'success'
      );
      return redirect()->back()->with($notification);
    } //End Method

    public function ListBarang()
    { 
      // data masukbarang 
      $barang = Barang::orderby('created_at','DESC')->get();

      //data keluarbarang 
      $pinjambarang = PeminjamanBarang::where('status', 'Approved')->orderBy('created_at', 'desc')->get();
      $ambilbarang = PengambilanBarang::where('status', 'Approved')->orderBy('created_at', 'desc')->get();
      
      
        return view('admin.admin_list_barang')->with(compact( 'barang', 'pinjambarang', 'ambilbarang', ));
    }
    public function ViewListBarang($id)
    {
      $item = MasukBarang::find($id);
      return view('admin.admin_view_list', compact('item'));

    } //End Method


    public function FilterListBarang(Request $request)
  {
    $barang = Barang::all();
    $pinjambarang = PeminjamanBarang::all();
    $ambilbarang = PengambilanBarang::all();

    return view('admin.admin_list_barang', compact('barang', 'pinjambarang', 'ambilbarang'));
  } //End Method
} 
  
