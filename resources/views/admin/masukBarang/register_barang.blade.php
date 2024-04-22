@extends('admin.admin_dashboard')
@section('admin')


<div class="page-content">
<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div>
          <h4 class="mb-3">Register Barang</h4>
        </div>
        <div class="d-flex flex-row align-items-center justify-content-between mb-4" >
          <a href="{{ route('masuk.barang.export') }}" type="button" class="btn btn-outline-primary btn-block btn-icon-text">
          <i data-feather="file-text" class="btn-icon-prepend"></i>
            Export as Excel
          </a>
          <a href="{{ route('add.register') }}" class="btn btn-outline-primary btn-icon-text">
            <i data-feather="plus" class="btn-icon-prepend"></i> Tambah 
          </a>
        </div>  
        <div class="table-responsive">
          <table id="dataTableExample" class="table">
            <thead>
              <tr>
                <th>Id Barang</th>
                <th>Serial Number</th>
                <th>Tanggal Masuk</th>
                <th>Nama Barang</th>
                <th>Quantity</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($table as $key => $item)
              <tr>
                <td>{{ $item->barang->id_barang }}</td>
                <td>{{ $item->barang->serial_number }}</td>
                <td>{{ $item->tanggal_masuk }}</td>
                <td>{{ $item->barang->nama_barang }}</td>
                <td>{{ $item->jumlah_masuk }}</td>
                <td>
                  <a href="{{ route ('view.register',  ['id' => $item->id]) }}" type="button" class="btn btn-primary btn-icon">
                    <i data-feather="eye"></i>
                  </a>
                  <a href="{{route ('edit.register', $item->id ) }}" type="button" class="btn btn-secondary btn-icon">
                    <i data-feather="edit" class="btn-icon-prepend"></i>
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