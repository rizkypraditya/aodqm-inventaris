
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
          <h4>Detail Peminjaman</h4>
        </div>
        <div class="d-flex justify-content-center mt-5 mb-5 ">
          <img class="wd-md-400 wd-300" src="{{ (!empty ($pinjam->photo_pinjambarang)) ? url('/barangpinjam_image/' .$pinjam->photo_pinjambarang) :url('no_image.jpg')}}" alt="photo_barang">
        </div>
        <div class="d-flex justify-content-center gap-6 mb-5">
          <div>
             <div class="mt-3">
              <label class="tx-13 fw-bolder mb-0 text-uppercase">Id Barang:</label>
              <p class="text-muted">{{ $pinjam->barang->id_barang }}</p>
            </div>
            <div class=" mt-3">
              <label class="tx-13 fw-bolder mb-0 text-uppercase">Serial Number:</label>
              <p class="text-muted">{{ $pinjam->barang->serial_number }}</p>
            </div>
            <div class=" mt-3">
              <label class="tx-13 fw-bolder mb-0 text-uppercase">Tanggal Peminjaman:</label>
              <p class="text-muted">{{ $pinjam->tanggal_pinjam }}</p>  
            </div>
          </div>
          <div>
            <div class="mt-3">
            <label class="tx-13 fw-bolder mb-0 text-uppercase">Nama Barang:</label>
            <p class="text-muted">{{ $pinjam->barang->nama_barang }}</p>
            </div>
            <div class="mt-3">
              <label class="tx-13 fw-bolder mb-0 text-uppercase">Quantity:</label>
              <p class="text-muted">{{ $pinjam->jumlah_pinjam }}</p>
            </div>
            <div class="mt-3">
              <label class="tx-13 fw-bolder mb-0 text-uppercase">Deskripsi:</label>
              <p class="text-muted">{{ $pinjam->deskripsi }}</p>
            </div>
          </div> 
          <div>
            <div class="mt-3">
              <label class="tx-13 fw-bolder mb-0 text-uppercase">Peminjam:</label>
              <p class="text-muted">{{ $pinjam->user->name }}</p>
            </div>
            <div class="mt-3">
              <label class="tx-13 fw-bolder mb-0 text-uppercase">Mitra:</label>
              <p class="text-muted">{{ $pinjam->user->mitra }}</p>
            </div>            
            <div class="mt-3">
              <label class="tx-13 fw-bolder mb-0 text-uppercase">Status:</label>
              <p class="text-muted">{{ $pinjam->status }}</p>
            </div>
          </div> 
        </div>  
      </div>
    </div>
  </div>

</div>

</div>

<script type="text/javascript">
  $(document).ready(function(){
    $('#image').change(function(e){
      var reader = new FileReader();
      reader.onload = function(e){
        $('#showImage').attr('src', e.target.result);
      }
      reader.readAsDataURL(e.target.files['0']);
    });
  });
</script>

@endsection