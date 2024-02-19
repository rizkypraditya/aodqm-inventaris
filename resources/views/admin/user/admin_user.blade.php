@extends('admin.admin_dashboard')
@section('admin')


<div class="page-content">
<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="d-flex flex-row align-items-center justify-content-between mb-3">
          <h4 class="mb-4">Users</h4>
          <a href="{{ route('add.user') }}" class="btn btn-outline-primary btn-icon-text">
            <i data-feather="plus" class="btn-icon-prepend"></i> Tambah 
          </a>
        </div>
    
        <div class="table-responsive">
          <table id="dataTableExample" class="table">
            <thead>
              <tr>
                <th>Email</th>
                <th>Nama</th>
                <th>Mitra</th>
                <th>Nomor</th>
                <th>Role</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>  
              @foreach($table as $key => $item)       
              <tr>
                <td>{{ $item->email}}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->mitra }}</td>
                <td>{{ $item->phone }}</td>
                <td>{{ $item->role }}</td>
                <td>
                  <a href="{{route ('view.user', ['id' => $item->id]) }}" type="button" class="btn btn-primary btn-icon">
                    <i data-feather="eye"></i>
                  </a>
                  <a href="{{route ('delete.user', ['id' => $item->id]) }}" type="button" class="btn btn-danger btn-icon" id="delete">
                    <i data-feather="trash-2"></i>
                  </a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

</div>

</div>


@endsection