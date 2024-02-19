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
          <h4>Pengambilan Barang</h4>
        </div>
        <form method="POST" action="{{route('store.ambil.barang')}}" class="forms-sample" enctype="multipart/form-data" class="forms-sample">
        @csrf
        <div class="form-group mb-3">
        <select name="id_barang" id="id" class="form-control">
            <option value="" selected disabled> -------Silahkan Pilih Barang------- </option>
              @foreach ($data as $barang)
                @if ($barang->jumlah_barang != 0)
                <option value="{{ $barang->id }} " data-lokasi="{{ $barang->lokasi_barang }}" data-jumlah="{{ $barang->jumlah_barang }}" data-serial="{{ $barang->serial_number }}" data-id_barang="{{ $barang->id_barang }}" data-nama="{{ $barang->nama_barang }}">{{ $barang->nama_barang }}</option>
                @endif  
              @endforeach
          </select>
        </div>
        <div class="mb-5 card" id="detail-barang">
          <div class="card-header text-white bg-primary">Detail Barang</div>
          <div class="card-body">
            <h5 class="card-title" id="nama_barang"></h5>
            <p class="card-text" id="id_barang" ></p>
            <p class="card-text" id="serial_number" ></p>
            <p class="card-text" id="jumlah_barang" ></p>
            <p class="card-text" id="lokasi_barang" ></p>
          </div>
        </div>
          <div class="row mb-3">
            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Quantity</label>
            <div class="col-sm-9">
              <input type="number" name="jumlah_ambil" class="form-control @error('jumlah_ambil') is-invalid @enderror" placeholder="Masukkan jumlah barang">
              @error('jumlah_ambil')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
          </div>
          <div class="row mb-3">
            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Tanggal Diambil</label>
            <div class="col-sm-9">
              <input type="date" name="tanggal_ambil" class="form-control @error('tanggal_ambil') is-invalid @enderror" placeholder="Masukkan tanggal dipinjam">
              @error('tanggal_ambil')
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
              <input type="file" name="photo_ambilbarang" class="form-control @error('photo_ambilbarang') is-invalid @enderror" id="image">
              @error('photo_ambilbarang')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
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
<script>
  document.getElementById('id').addEventListener('change', function() {
    var id_barang = this.options[this.selectedIndex].getAttribute('data-id_barang');
    var nama = this.options[this.selectedIndex].getAttribute('data-nama');
    var serial = this.options[this.selectedIndex].getAttribute('data-serial');
    var jumlah = this.options[this.selectedIndex].getAttribute('data-jumlah');
    var lokasi = this.options[this.selectedIndex].getAttribute('data-lokasi');

    document.getElementById('nama_barang').textContent = nama;
    document.getElementById('id_barang').textContent = 'ID Barang: ' + id_barang;
    document.getElementById('serial_number').textContent = 'Serial Number: ' + serial;
    document.getElementById('jumlah_barang').textContent = 'Jumlah Barang: ' + jumlah;
    document.getElementById('lokasi_barang').textContent = 'Lokasi Barang: ' + lokasi;
  });
</script>
@endsection