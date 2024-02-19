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
            <input type="text" class="form-control " id="search-input" name="search" placeholder="Search">
          </div>
        </form>
        <div class="mt-4 card d-flex flex-row">
        @foreach($barang as $item)
            <div class="card-body">
              <h4 class="mb-4">Detail Barang</h4>
              <p class="card-text mb-2">Id barang: {{$item->id_barang}}</p>
              <p class="card-text mb-2">Serial Number: {{$item->serial_number}}</p>
              <p class="card-text mb-2">Nama barang: {{$item->nama_barang}}</p>
              <p class="card-text mb-2">Jumlah barang yang tersedia: {{$item->jumlah_barang}}</p>
            </div>
          </div>
        @endforeach
          <div id="content">
            <ul class="timeline">
            @foreach($history as $item)
              <li class="event" data-date="{{$item->tanggal}}">
                <h3 class="title">{{$item->activity_type}}</h3>
                <p>{{$item->activity_type}} {{$item->user}} {{$item->jumlah}}</p>
            @endforeach
              </li>
            </ul>
          </div> 
      </div>
    </div>
  </div>
</div>
@endsection