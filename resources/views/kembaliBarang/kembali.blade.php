@extends('Dashboard')
@section('user')


<div class="page-content">
<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="d-flex flex-row align-items-center justify-content-between mb-3">
          <h4 class="mb-4">Pengembalian Barang</h4>
          <a href="{{route('create.kembali.barang')}}" class="btn btn-outline-primary btn-icon-text">
            <i data-feather="plus" class="btn-icon-prepend"></i> Tambah 
          </a>
        </div>
        @php 
        $id = Auth::user()->id;
        @endphp
        <div class="table-responsive">
          <table id="dataTableExample" class="table">
            <thead>
              <tr>
                <th>Id Barang</th>
                <th>Nama Barang</th>
                <th>Tanggal Pengembalian</th>
                <th>Quantity</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>     
            @foreach( $kembali as $item )   
            @if($item->user_id == $id)    
              <tr>
                <td>{{ $item->barang->barang->id_barang }}</td>
                <td>{{ $item->barang->barang->nama_barang }}</td>
                <td>{{ $item->tanggal_kembali }}</td>
                <td>{{ $item->jumlah_kembali }}</td>
                <td>
                @if($item->status == 'pending')
                  <span type="text" class="text-white bg-warning p-2">
                      <label for="">Pending</label>
                  </span>
                <td>
                  <a href="{{route('view.kembali.barang', ['id' => $item->id])}}" type="button" class="btn btn-primary btn-icon">
                    <i data-feather="eye"></i>
                  </a>
                  <a href="{{route('edit.kembali.barang', ['id' => $item->id])}}" type="button" class="btn btn-secondary btn-icon">
                    <i data-feather="edit"></i>
                  </a>
                  <a href="{{route ('delete.kembali.barang', ['id' => $item->id]) }}" type="button" class="btn btn-danger btn-icon" id="delete">
                    <i data-feather="trash-2"></i>
                  </a>
                </td>
                @elseif($item->status == 'approved')
                  <span type="text" class="text-white bg-success p-2">
                    <label for="">Approved</label>
                  </span>
                  <td>
                    <a href="{{route('view.kembali.barang', ['id' => $item->id])}}" type="button" class="btn btn-primary btn-icon">
                      <i data-feather="eye"></i>
                    </a>
                  </td>  
                @else
                  <span type="text" class="text-white bg-danger p-2">
                    <label for="">Rejected</label>
                  </span>
                  <td>
                    <a href="{{route('view.kembali.barang', ['id' => $item->id])}}" type="button" class="btn btn-primary btn-icon">
                      <i data-feather="eye"></i>
                    </a>
                  </td> 
                @endif  
              </tr>
              @endif  
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