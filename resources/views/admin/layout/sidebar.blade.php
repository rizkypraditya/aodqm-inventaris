<style>
</style>

<nav class="sidebar">
      <div class="sidebar-header">
        <a href="#" class="sidebar-brand">
          Masih<span>Mikir</span> 
        </a>
        <div class="sidebar-toggler not-active">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
      <div class="sidebar-body">
        <ul class="nav">
          <li class="nav-item nav-category">Home</li>
          <li class="nav-item">
            <a href="/admin/dashboard" class="nav-link">
              <i class="link-icon" data-feather="grid"></i>
              <span class="link-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#masukbarangs" role="button" aria-expanded="false" aria-controls="masukbarangs">
              <i class="link-icon" data-feather="inbox"></i>
              <span class="link-title">Masuk barang</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="masukbarangs">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="{{ route ('register.barang')}}" class="nav-link">Register Barang</a>
                </li>
                <li class="nav-item">
                  <a href="{{ route ('tambah.barang')}}" class="nav-link">Tambah Barang</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#keluarbarangs" role="button" aria-expanded="false" aria-controls="keluarabarang">
              <i class="link-icon" data-feather="archive"></i>
              <span class="link-title">Keluar Barang</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="keluarbarangs">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="{{ route ('pengembalian.barang')}}" class="nav-link">Pengembalian Barang</a>
                </li>
                <li class="nav-item">
                  <a href="{{ route ('peminjaman.barang')}}" class="nav-link">Peminjaman Barang</a>
                </li>
                <li class="nav-item">
                  <a href="{{ route ('pengambilan.barang')}}" class="nav-link">Pengambilan Barang</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a href="{{ route ('history')}}" class="nav-link">
              <i class="link-icon" data-feather="database"></i>
              <span class="link-title">History</span>
            </a>
          </li>
          </li>
          <li class="nav-item">
            <a href="{{ route ('list.barang')}}" class="nav-link">
              <i class="link-icon" data-feather="table"></i>
              <span class="link-title">List Barang</span>            
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route ('admin.user')}}" class="nav-link">
              <i class="link-icon" data-feather="users"></i>
              <span class="link-title">Users</span>            
            </a>
          </li>
        </ul>
      </div>
    </nav>