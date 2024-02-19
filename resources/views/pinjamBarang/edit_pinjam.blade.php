@extends('Dashboard')
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
          <h4>Edit Peminjaman Barang</h4>
        </div>
        <form method="POST" action="{{route('update.pinjam.barang')}}" class="forms-sample" enctype="multipart/form-data" class="forms-sample">
        @csrf
        <div class="mb-5 card" id="detail-barang">
          <div class="card-header text-white bg-primary">Detail Barang</div>
          <div class="card-body">
            <h5 class="card-title">{{$pinjam->barang->nama_barang}}</h5>
            <p class="card-text" >Id Barang: {{$pinjam->barang->id_barang}}</p>
            <p class="card-text" >Serial Number: {{$pinjam->barang->serial_number}}</p>
            <p class="card-text" >Lokasi Barang: {{$pinjam->barang->lokasi_barang}}</p>
            <p class="card-text" >Jumlah Barang: {{$pinjam->barang->jumlah_barang}}</p>
          </div>
        </div>
          <div class="row mb-3">
            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Jumlah Barang</label>
            <div class="col-sm-9">
              <input type="number" name="jumlah_pinjam" class="form-control @error('jumlah_pinjam') is-invalid @enderror" value="{{$pinjam->jumlah_pinjam}}">
              @error('jumlah_pinjam')
              <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
          </div>
          <div class="row mb-3">
            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Tanggal Pinjam</label>
            <div class="col-sm-9">
              <input type="date" name="tanggal_pinjam" class="form-control @error('tanggal_pinjam') is-invalid @enderror" value="{{$pinjam->tanggal_pinjam}}">
              @error('tanggal_pinjam')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
          </div>
          <div class="row mb-3">
            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Deskripsi</label>
            <div class="col-sm-9">
              <input type="text" name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" value="{{$pinjam->deskripsi}}" rows="5"></input>
              @error('deskripsi')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
          </div>
          <div class="row">
            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Foto</label>
            <div class="col-sm-9">
              <input type="file" name="photo_pinjambarang" class="form-control @error('photo_pinjambarang') is-invalid @enderror" id="image">
              @error('photo_pinjambarang')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
          </div>
          <div class="row mt-3 mb-3">
            <label for="exampleInputMobile" class="col-sm-3 col-form-label"></label>
            <img  id="showImage" class="wd-150" src="{{ (!empty ($pinjam->photo_pinjambarang)) ? url('barangpinjam_image/' .$pinjam->photo_pinjambarang) :url('no_image.jpg')}}" alt="barang">
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary me-2">Simpan</button>
            <a href="{{ route('pinjam.barang') }}" class="btn btn-outline-secondary">Batal</a>
          </div>  
        </form>
      </div>     
    </div>
  </div>
</div>

@endsection