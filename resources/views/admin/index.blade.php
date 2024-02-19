@extends('admin.admin_dashboard')
@section('admin')

<style>
  .gradient-card1 {
    background: linear-gradient(to bottom, rgba(116, 161, 249, 1), rgba(116, 161, 249, 0.5));
    color: white;
    border-radius: 10px;
  }
  .gradient-card2 {
    background: linear-gradient(to bottom, rgba(255, 140, 140, 1), rgba(255, 140, 140, 0.5));
    color: white;
    border-radius: 10px;
  }
  .gradient-card3 {
    background: linear-gradient(to bottom, rgba(165, 143, 255, 1), rgba(165, 143, 255, 0.5));
    color: white;
    border-radius: 10px;
  }
</style> 

<div class="page-content">

<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
  <div>
    <h4 class="mb-3 mb-md-0">Welcome to Admin Dashboard</h4>
  </div>
</div>

<div class="row">
  <div class="col-12 col-xl-12 stretch-card">
    <div class="row flex-grow-1">
      <div class="col-md-4 grid-margin stretch-card">
        <div class="card gradient-card1">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-baseline">
              <h6 class="card-title mb-0">Jumlah Barang</h6>
              <div class="dropdown mb-2">
              </div>
            </div>
            @php
                $barang = App\Models\Barang::sum('jumlah_barang');
                $kembali =  App\Models\PengembalianBarang::where('status', 'approved')->sum('jumlah_kembali');
            @endphp
            <div class="row ">
              <div class="col-6 col-md-12 col-xl-5">
                <h3 class="">{{ $barang }}<i class="" data-feather="inbox"></i></span></h3> 
              </div>
              <div class="col-6 col-md-12 col-xl-7">
                <div id="customersChart" class="mt-md-3 mt-xl-0"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4 grid-margin stretch-card">
        <div class="card gradient-card2">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-baseline">
              <h6 class="card-title mb-0">Jumlah Barang Keluar</h6>
              <div class="dropdown mb-2">
              </div>
            </div>
             @php
                $pinjam = App\Models\PeminjamanBarang::where('status', 'approved')->sum('jumlah_pinjam');
                $ambil = App\Models\PengambilanBarang::where('status', 'approved')->sum('jumlah_ambil');
            @endphp
            <div class="row">
              <div class="col-6 col-md-12 col-xl-5">
                <h3 class="mb-4">{{ $pinjam + $ambil }}<span><i class="" data-feather="archive"></i></span></h3>
              </div>
              <div class="col-6 col-md-12 col-xl-7">
                <div id="ordersChart" class="mt-md-3 mt-xl-0"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4 grid-margin stretch-card">
        <div class="card gradient-card3">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-baseline">
              <h6 class="card-title mb-0">User</h6>
              <div class="dropdown mb-2">
              </div>
            </div>
            <div class="row">
              <div class="col-6 col-md-12 col-xl-5">
                <h3 class="mb-2 mr-5">{{$totalUser}}<span><i class="" data-feather="users"></i> </span></h3>
              </div>
              <div class="col-6 col-md-12 col-xl-7">
                <div id="growthChart" class="mt-md-3 mt-xl-0"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div> <!-- row -->


<div class="row">
  <div class="">
    <div class="card ">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-baseline mb-4">
          <h6 class="card-title mb-0">Data Terbaru</h6>
        </div>
        <div class="table-responsive">
          <table class="table table-hover mb-0">
            <thead>
              <tr>
                <th class="pt-0">Id Barang</th>
                <th class="pt-0">Serial Number</th>
                <th class="pt-0">Nama Barang</th>
                <th class="pt-0">Jenis Barang</th>
                <th class="pt-0">Quantity</th>
                <th class="pt-0">Keterangan</th> 
              </tr>
            </thead>
            <tbody>
              @foreach($masukbarang as $item)
              <tr>
                <td>{{$item->barang->id_barang}}</td>
                <td>{{$item->barang->serial_number}}</td>
                <td>{{$item->barang->nama_barang}}</td>
                <td>{{$item->barang->jenis_barang}}</td>
                <td>{{$item->jumlah_masuk}}</td>
                <td>   
                  <a href="" type="text" class="text-white bg-success p-2">
                    <label for="">Register</label>
                  </a>
                </td>
              </tr>
              @endforeach
              @foreach($tambahbarang as $item2)
              <tr>
                <td>{{$item2->barang->id_barang}}</td>
                <td>{{$item2->barang->serial_number}}</td>
                <td>{{$item2->barang->nama_barang}}</td>
                <td>{{$item2->barang->jenis_barang}}</td>
                <td>{{$item2->jumlah_tambah}}</td>
                <td>   
                  <span type="text" class="text-white bg-secondary p-2">
                    <label for="">Tambah</label>
                  </span>
                </td>
              </tr>
              @endforeach
              @foreach ($pinjambarang as $item1)
              @if($item1->jumlah_pinjam != 0)
              <tr>
                <td>{{$item1->barang->id_barang}}</td>
                <td>{{$item1->barang->serial_number}}</td>
                <td>{{$item1->barang->nama_barang}}</td>
                <td>{{$item1->barang->jenis_barang}}</td>
                <td>{{$item1->jumlah_pinjam}}</td>
                <td>
                <span  type="text" class="text-white bg-warning p-2">
                    <label for="">Pinjam</label>
                  </span>
                </td>
              </tr>
              @endif
              @endforeach
              @foreach ($kembalibarang as $item3)
              @if($item3->jumlah_kembali != 0)
              <tr>
                <td>{{$item3->barang->barang->id_barang}}</td>
                <td>{{$item3->barang->barang->serial_number}}</td>
                <td>{{$item3->barang->barang->nama_barang}}</td>
                <td>{{$item3->barang->barang->jenis_barang}}</td>
                <td>{{$item3->jumlah_kembali}}</td>
                <td>
                <span  type="text" class="text-white bg-info p-2">
                    <label for="">Kembali</label>
                  </span>
                </td>
              </tr>
              @endif
              @endforeach
              @foreach ($ambilbarang as $item4)
              @if($item4->jumlah_ambil != 0)
              <tr>
                <td>{{$item4->barang->id_barang}}</td>
                <td>{{$item4->barang->serial_number}}</td>
                <td>{{$item4->barang->nama_barang}}</td>
                <td>{{$item4->barang->jenis_barang}}</td>
                <td>{{$item4->jumlah_ambil}}</td>
                <td>
                <span  type="text" class="text-white bg-danger p-2">
                    <label for="">Ambil</label>
                  </span>
                </td>
              </tr>
              @endif
              @endforeach
            </tbody>
          </table>
        </div>
      </div> 
    </div>
  </div>
</div> <!-- row -->

</div>

@endsection