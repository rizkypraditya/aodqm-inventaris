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
          <h4>Edit Barang</h4>
        </div>
        <form method="POST" action="" class="forms-sample" enctype="multipart/form-data" class="forms-sample">
        @csrf
        <input type="hidden" name="id" value="{{ $tambahbarang->barang->id_barang }}">

          <div class="row mb-3">
            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Resi Pengiriman</label>
            <div class="col-sm-9">
              <input type="text" name="resi_pengiriman" class="form-control @error('resi_pengiriman') is-invalid @enderror" value="{{$tambahbarang->resi_pengiriman}}">
              @error('resi_pengiriman')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
          </div>
          <div class="row mb-3">
            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Owner</label>
            <div class="col-sm-9">
              <input type="text" name="owner" class="form-control @error('owner') is-invalid @enderror" value="{{$tambahbarang->owner}}">
              @error('owner')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
          </div>
          <div class="row mb-3">
            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Pengirim</label>
            <div class="col-sm-9">
              <input type="text" name="pengirim" class="form-control @error('pengirim') is-invalid @enderror" value="{{$tambahbarang->pengirim}}">
              @error('pengirim')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
          </div>
          <div class="row mb-3">
            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Jumlah Barang</label>
            <div class="col-sm-9">
              <input type="number" name="jumlah_tambah" class="form-control @error('jumlah_tambah') is-invalid @enderror" value="{{$tambahbarang->jumlah_tambah}}">
              @error('jumlah_tambah')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
          </div>
          <div class="row mb-3">
            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Tanggal Masuk</label>
            <div class="col-sm-9">
              <input type="date" name="tanggal_tambah" class="form-control @error('tanggal_tambah') is-invalid @enderror" value="{{$tambahbarang->tanggal_tambah}}">
              @error('tanggal_tambah')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
          </div>
          <div class="row mb-3">
            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Deskripsi</label>
            <div class="col-sm-9">
              <input type="text" name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" value="{{$tambahbarang->deskripsi}}" rows="5"></input>
              @error('deskripsi')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
          </div>
          <div class="row">
            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Foto</label>
            <div class="col-sm-9">
              <input type="file" name="photo_tambahbarang" class="form-control @error('photo_tambahbarang') is-invalid @enderror" id="image">
              @error('photo_tambahbarang')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
          </div>
          <div class="row mt-3 mb-3">
            <label for="exampleInputMobile" class="col-sm-3 col-form-label"></label>
            <img  id="showImage" class="wd-150" src="{{ (!empty ($tambahbarang->photo_tambahbarang)) ? url('tambah_image/' .$tambahbarang->photo_tambahbarang) :url('no_image.jpg')}}" alt="barang">
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary me-2">Simpan</button>
            <a href="{{ route('tambah.barang') }}" class="btn btn-outline-secondary">Batal</a>
          </div>  
        </form>
      </div>     
    </div>
  </div>
</div>

@endsection