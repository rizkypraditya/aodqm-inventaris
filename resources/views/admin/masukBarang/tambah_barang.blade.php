@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">
<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="d-flex flex-row align-items-center justify-content-between mb-3">
          <h4 class="mb-3">Tambah Barang</h4>
          <a href="{{ route('add.tambah') }}" class="btn btn-outline-primary btn-icon-text">
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
            @foreach ($tambah as $item)
              <tr>
                <td>{{ $item->barang->id_barang }}</td>
                <td>{{ $item->barang->serial_number }}</td>
                <td>{{ $item->tanggal_tambah }}</td>
                <td>{{ $item->barang->nama_barang }}</td>
                <td>{{ $item->jumlah_tambah }}</td>
                <td>
                  <a href="{{route('view.tambah',  ['id' => $item->id])}}" type="button" class="btn btn-primary btn-icon">
                    <i data-feather="eye"></i>
                  </a>
                  <a href="{{route('delete.tambah',  ['id' => $item->id])}}" type="button" class="btn btn-danger btn-icon" id="delete">
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