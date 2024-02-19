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
            <a href="{{route('dashboard')}}" class="nav-link">
              <i class="link-icon" data-feather="grid"></i>
              <span class="link-title">Dashboard</span>
            </a>
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
                  <a href="{{route('kembali.barang')}}" class="nav-link">Pengembalian Barang</a>
                </li>
                <li class="nav-item">
                  <a href="{{route('pinjam.barang')}}" class="nav-link">Peminjaman Barang</a>
                </li>
                <li class="nav-item">
                  <a href="{{route('ambil.barang')}}" class="nav-link">Pengambilan Barang</a>
                </li>
              </ul>
            </div>
          </li>
        </ul>
      </div>
    </nav>