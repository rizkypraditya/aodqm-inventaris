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
          <h4>Detail Profile</h4>
          <button type="button" class="btn btn-primary btn-icon-text" data-bs-toggle="modal" data-bs-target="#profileEdit">
            <i data-feather="edit" class="btn-icon-prepend"></i> Edit 
          </button>
        </div>
          <div class="d-flex justify-content-center mt-5 mb-5 ">
            <img class="wd-md-400 wd-300" src="{{ (!empty ($profileUser->photo)) ? url('/admin_image/' .$profileUser->photo) :url('no_image.jpg')}}" alt="profile">
          </div>
        <div class="d-flex justify-content-center gap-6 mb-5">
          <div class="">
             <div class="mt-3">
              <label class="tx-13 fw-bolder mb-0 text-uppercase">Username:</label>
              <p class="text-muted">{{ $profileUser->username }}</p>
            </div>
            <div class=" mt-3">
              <label class="tx-13 fw-bolder mb-0 text-uppercase">Email:</label>
              <p class="text-muted">{{ $profileUser->email }}</p>
            </div>
            <div class=" mt-3">
              <label class="tx-13 fw-bolder mb-0 text-uppercase">Nama:</label>
              <p class="text-muted">{{ $profileUser->name }}</p>  
            </div>
          </div>
          <div>
            <div class="mt-3">
            <label class="tx-13 fw-bolder mb-0 text-uppercase">Nomor Telepon:</label>
            <p class="text-muted">{{ $profileUser->phone }}</p>
            </div>
            <div class="mt-3">
              <label class="tx-13 fw-bolder mb-0 text-uppercase">Nama Mitra:</label>
              <p class="text-muted">{{ $profileUser->mitra }}</p>
            </div>
          </div>  
          
        </div>   
      </div>
    </div>
  </div>
          <!-- Modal -->
          <div class="modal fade" id="profileEdit" tabindex="-1" aria-labelledby="profileEditLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="profileEditlLabel">Edit</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                </div>

                <form method="POST" action="{{ route('profile.store') }}" class="forms-sample" enctype="multipart/form-data">
                  @csrf
      
                <div class="modal-body">
                  <form class="forms-sample"> 
                    <div class="row mb-3">
                      <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Username</label>
                      <div class="col-sm-9">
                        <input type="text" name="username" class="form-control" id="exampleInputUsername2" value="{{ $profileUser->username }}">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Email</label>
                      <div class="col-sm-9">
                        <input type="email" name="email" class="form-control" id="exampleInputEmail2" autocomplete="off" value="{{ $profileUser->email }}">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="exampleInputMobile" class="col-sm-3 col-form-label">Nama</label>
                      <div class="col-sm-9">
                        <input type="text" name="name" class="form-control" id="exampleInputMobile" value="{{ $profileUser->name }}">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="exampleInputMobile" class="col-sm-3 col-form-label">Nomor Telepon</label>
                      <div class="col-sm-9">
                        <input type="number" name="phone" class="form-control" id="exampleInputMobile" value="{{ $profileUser->phone }}">
                      </div>
                    </div>                    
                    <div class="row mb-3">
                      <label for="exampleInputMobile" class="col-sm-3 col-form-label">Nama Mitra</label>
                      <div class="col-sm-9">
                        <input type="text" name="mitra"  class="form-control" id="exampleInputMobile" value="{{ $profileUser->mitra }}">
                      </div>
                    <div class="row mt-3 mb-3">
                      <label for="exampleInputMobile" class="col-sm-3 col-form-label">Foto</label>
                      <div class="col-sm-9">
                        <input class="form-control" name="photo" type="file" id="image">
                      </div>
                    </div> 
                    <div class="row mt-3 mb-3">
                      <label for="exampleInputMobile" class="col-sm-3 col-form-label"></label>
                      <img  id="showImage" class="wd-100 rounded-circle" src="{{ (!empty ($profileUser->photo)) ? url('/admin_image/' .$profileUser->photo) :url('no_image.jpg')}}" alt="profile">
                    </div>
                  </form>
                 </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-secondary rounded-lg" data-bs-dismiss="modal">Tutup</button>
                  <button type="submit" class="btn btn-primary">Ubah</button>
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