<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\User;
use App\Models\PengembalianBarang;
use App\Models\PeminjamanBarang;
use App\Models\PengambilanBarang;

use Illuminate\Support\Facades\Hash;

class Controller extends BaseController
{
  
  public function Dashboard()
  {
    $id = Auth::user()->id;
    $pinjambarang = PeminjamanBarang::where('status', 'Approved')->orderBy('id', 'desc')->limit(3)->get();
    $ambilbarang = PengambilanBarang::where('status', 'Approved')->orderBy('id', 'desc')->limit(3)->get();
    $kembalibarang = PengembalianBarang::where('status', 'Approved')->orderBy('id', 'desc')->limit(3)->get();

      return view('index')->with(compact('pinjambarang','ambilbarang','kembalibarang'));
  } //End Method

  public function UserLogout(Request $request)
  {
      Auth::guard('web')->logout();

      $request->session()->invalidate();

      $request->session()->regenerateToken();

      return redirect('login');   
  } //End Method

  public function Profile()
  {
    $id = Auth::user()->id;
    $profileUser = User::find($id);
    return view('profile.profile', compact('profileUser'));

  } //End Method
  
  public function ProfileStore(Request $request)
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
    return redirect()->back()->with($notification);
  } //End Method

  public function ChangePassword()
  { 
    $id = Auth::user()->id;
    $profileUser = User::find($id);
    return view('profile.change_password', compact('profileUser'));
  } //End Method

  public function UpdatePassword(Request $request)
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





}
