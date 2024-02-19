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
          <h4>Detail User</h4>
        </div>
          <div class="d-flex justify-content-center mt-5 mb-5 ">
            <img class="wd-md-400 wd-300" src="{{ (!empty ($detailUser->photo)) ? url('/admin_image/' .$detailUser->photo) :url('no_image.jpg')}}" alt="profile">
          </div>
        <div class="d-flex justify-content-center gap-6 mb-5">
          <div class="">
             <div class="mt-3">
              <label class="tx-13 fw-bolder mb-0 text-uppercase">Username:</label>
              <p class="text-muted">{{ $detailUser->username }}</p>
            </div>
            <div class=" mt-3">
              <label class="tx-13 fw-bolder mb-0 text-uppercase">Email:</label>
              <p class="text-muted">{{ $detailUser->email }}</p>
            </div>
            <div class=" mt-3">
              <label class="tx-13 fw-bolder mb-0 text-uppercase">Nama:</label>
              <p class="text-muted">{{ $detailUser->name }}</p>  
            </div>
          </div>
          <div>
            <div class="mt-3">
            <label class="tx-13 fw-bolder mb-0 text-uppercase">Nomor Telepon:</label>
            <p class="text-muted">{{ $detailUser->phone }}</p>
            </div>
            <div class="mt-3">
              <label class="tx-13 fw-bolder mb-0 text-uppercase">Nama Mitra:</label>
              <p class="text-muted">{{ $detailUser->mitra }}</p>
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