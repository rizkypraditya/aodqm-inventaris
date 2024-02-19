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
          <h4>Edit Pengambilan Barang</h4>
        </div>
        <form method="POST" action="{{route('update.ambil.barang')}}" class="forms-sample" enctype="multipart/form-data" class="forms-sample">
        @csrf
        <div class="mb-5 card" id="detail-barang">
          <div class="card-header text-white bg-primary">Detail Barang</div>
          <div class="card-body">
            <h5 class="card-title">{{$ambil->barang->nama_barang}}</h5>
            <p class="card-text" >Id Barang: {{$ambil->barang->id_barang}}</p>
            <p class="card-text" >Serial Number: {{$ambil->barang->serial_number}}</p>
            <p class="card-text" >Lokasi Barang: {{$ambil->barang->lokasi_barang}}</p>
            <p class="card-text" >Jumlah Barang: {{$ambil->barang->jumlah_barang}}</p>
          </div>
        </div>
          <div class="row mb-3">
            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Jumlah Barang</label>
            <div class="col-sm-9">
              <input type="number" name="jumlah_ambil" class="form-control @error('jumlah_ambil') is-invalid @enderror" value="{{$ambil->jumlah_ambil}}">
              @error('jumlah_ambil')
              <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
          </div>
          <div class="row mb-3">
            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Tanggal ambil</label>
            <div class="col-sm-9">
              <input type="date" name="tanggal_ambil" class="form-control @error('tanggal_ambil') is-invalid @enderror" value="{{$ambil->tanggal_ambil}}">
              @error('tanggal_ambil')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
          </div>
          <div class="row mb-3">
            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Deskripsi</label>
            <div class="col-sm-9">
              <input type="text" name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" value="{{$ambil->deskripsi}}" rows="5"></input>
              @error('deskripsi')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
          </div>
          <div class="row">
            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Foto</label>
            <div class="col-sm-9">
              <input type="file" name="photo_ambilbarang" class="form-control @error('photo_ambilbarang') is-invalid @enderror" id="image">
              @error('photo_ambilbarang')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
          </div>
          <div class="row mt-3 mb-3">
            <label for="exampleInputMobile" class="col-sm-3 col-form-label"></label>
            <img  id="showImage" class="wd-150" src="{{ (!empty ($ambil->photo_ambilbarang)) ? url('barangambil_image/' .$ambil->photo_ambilbarang) :url('no_image.jpg')}}" alt="barang">
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary me-2">Simpan</button>
            <a href="{{ route('ambil.barang') }}" class="btn btn-outline-secondary">Batal</a>
          </div>  
        </form>
      </div>     
    </div>
  </div>
</div>

@endsection