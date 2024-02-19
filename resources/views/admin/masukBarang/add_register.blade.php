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
          <h4>Register Barang</h4>
        </div>
        <form method="POST" action="{{ route('store.register') }}" class="forms-sample" enctype="multipart/form-data" class="forms-sample">
        @csrf
          <div class="row mb-3">
            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Id Barang</label>
            <div class="col-sm-9">
              <input type="text" name="id_barang" class="form-control @error('id_barang') is-invalid @enderror" placeholder="Masukkan id barang">
              @error('id_barang')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
          </div>
          <div class="row mb-3">
            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Serial Number</label>
            <div class="col-sm-9">
              <input type="text" name="serial_number" class="form-control @error('serial_number') is-invalid @enderror" placeholder="Masukkan serial number">
              @error('serial_number')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
          </div>
          <div class="row mb-3">
            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Resi Pengiriman</label>
            <div class="col-sm-9">
              <input type="text" name="resi_pengiriman" class="form-control @error('resi_pengiriman') is-invalid @enderror" placeholder="Masukkan resi pengiriman">
              @error('resi_pengiriman')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
          </div>
          <div class="row mb-3">
            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Owner</label>
            <div class="col-sm-9">
              <input type="text" name="owner" class="form-control @error('owner') is-invalid @enderror" placeholder="Masukkan owner">
              @error('owner')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
          </div>
          <div class="row mb-3">
            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Pengirim</label>
            <div class="col-sm-9">
              <input type="text" name="pengirim" class="form-control @error('pengirim') is-invalid @enderror" placeholder="Masukkan pengirim">
              @error('pengirim')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
          </div>
          <div class="row mb-3">
            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Nama Barang</label>
            <div class="col-sm-9">
              <input type="text" name="nama_barang" class="form-control @error('nama_barang') is-invalid @enderror" placeholder="Masukkan nama barang">
              @error('nama_barang')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
          </div>
          <div class="row mb-3">
            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Quantity</label>
            <div class="col-sm-9">
              <input type="number" name="jumlah_masuk" class="form-control @error('jumlah_masuk') is-invalid @enderror" placeholder="Masukkan jumlah barang">
              @error('jumlah_masuk')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
          </div>
          <div class="row mb-3">
            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Jenis Barang</label>
            <div class="col-sm-9">
              <input type="text" name="jenis_barang" class="form-control @error('jenis_barang') is-invalid @enderror" placeholder="Masukkan jenis barang">
              @error('jenis_barang')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
          </div>
          <div class="row mb-3">
            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Lokasi Barang</label>
            <div class="col-sm-9">
              <input type="text" name="lokasi_barang" class="form-control @error('lokasi_barang') is-invalid @enderror" placeholder="Masukkan lokasi barang">
              @error('lokasi_barang')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
          </div>
          <div class="row mb-3">
            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Tanggal Masuk</label>
            <div class="col-sm-9">
              <input type="date" name="tanggal_masuk" class="form-control @error('tanggal_masuk') is-invalid @enderror" placeholder="Masukkan tanggal masuk">
              @error('tanggal_masuk')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
          </div>
          <div class="row mb-3">
            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Deskripsi</label>
            <div class="col-sm-9">
              <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" placeholder="Masukkan deskripsi" rows="5"></textarea>
              @error('deskripsi')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
          </div>
          <div class="row mb-5">
            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Foto</label>
            <div class="col-sm-9">
              <input type="file" name="photo_barang" class="form-control @error('photo_barang') is-invalid @enderror" id="image">
              @error('photo_barang')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary me-2">Simpan</button>
            <a href="{{ route('register.barang') }}" class="btn btn-outline-secondary">Batal</a>
          </div>  
        </form>
      </div>     
    </div>
  </div>
</div>

@endsection