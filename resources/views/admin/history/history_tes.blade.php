@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">
<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="d-flex flex-row align-items-center justify-content-between mb-2">
          <h4 class="mb-4">History Barang</h4>
        </div>
        <form action="{{ route('searchbarang') }}" method="GET">
          <div class="input-group">
            <div class="input-group-text">
              <i data-feather="search"></i>
            </div>
            <input type="text" class="form-control" id="search-input" name="search" placeholder="Search">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
