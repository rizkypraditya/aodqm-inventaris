@extends('dashboard')
@section('user')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="page-content">
<div class="row">
</div>
<div class="row profile-body"> 
  <div class="col-md-12 col-xl-12 center-wrapper">
    <div class="card rounded">
      <div class="card-body">
        <div class="d-flex flex-row align-items-center justify-content-between mb-3">
          <h4>Change Password</h4>
        </div>
        <form method="POST" action="{{route('update.password')}}" class="forms-sample" enctype="multipart/form-data" class="forms-sample">
        @csrf

          <div class="row mb-3">
            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Password Lama</label>
            <div class="col-sm-9">
              <input type="password" name="old_password" class="form-control @error('old_password') is-invalid @enderror" id="old_password" autocomplete="off" placeholder="Masukkan password lama">
              @error('old_password')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
          </div>
          <div class="row mb-3">
            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Password Baru</label>
            <div class="col-sm-9">
              <input type="password" name="new_password" class="form-control @error('new_password') is-invalid @enderror" id="new_password" autocomplete="off" placeholder="Masukkan password baru">
              @error('new_password')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
          </div>
          <div class="row mb-3">
            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Konfirmasi Password Baru</label>
            <div class="col-sm-9">
              <input type="password" name="new_password_confirmation" class="form-control" id="new_password_confirmation" autocomplete="off" placeholder="Konfirmasi password baru">   
            </div>
          </div>
          <button type="submit" class="btn btn-primary me-2">Ubah</button>
        </form>
      </div>     
    </div>
  </div>
</div>

@endsection