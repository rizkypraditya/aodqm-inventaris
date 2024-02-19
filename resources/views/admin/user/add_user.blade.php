@extends('admin.admin_dashboard')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="page-content">
<div class="row">
</div>
<div class="row profile-body"> 
  <div class="col-md-12 col-xl-12 center-wrapper">
    <div class="card rounded">
      <div class="card-body">
        <div class="d-flex flex-row align-items-center justify-content-between mb-3">
          <h4>Tambah User</h4>
        </div>
        <form method="POST" action="{{ route ('store.user')}}" class="forms-sample" enctype="multipart/form-data" class="forms-sample">
        @csrf
          <div class="row mb-3">
            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Email</label>
            <div class="col-sm-9">
              <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Masukkan Email">
              @error('email')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
          </div>
          <div class="row mb-3">
            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Nama</label>
            <div class="col-sm-9">
              <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Masukkan Nama">
              @error('name')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
          </div>
          <div class="row mb-3">
            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Mitra</label>
            <div class="col-sm-9">
              <input type="text" name="mitra" class="form-control @error('mitra') is-invalid @enderror" placeholder="Masukkan Mitra">
              @error('mitra')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
          </div>
          <div class="row mb-3">
            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Nomor</label>
            <div class="col-sm-9">
              <input type="number" name="phone" class="form-control @error('phone') is-invalid @enderror" placeholder="Masukkan Nomor Telepon">
              @error('phone')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
          </div>
          <div class="row mb-3">
            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Role</label>
            <div class="col-sm-9">
              <input type="text" name="role" class="form-control @error('role') is-invalid @enderror" placeholder="Masukkan Role">
              @error('role')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
          </div>
          <div class="row mb-5">
            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Foto</label>
            <div class="col-sm-9">
              <input type="file" name="photo" class="form-control @error('photo') is-invalid @enderror" id="image">
              @error('photo')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary me-2">Simpan</button>
            <a href="{{route('admin.user')}}" class="btn btn-outline-secondary">Batal</a>
          </div>  
        </form>
      </div>     
    </div>
  </div>
</div>

@endsection