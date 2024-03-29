<style>
</style>

<nav class="sidebar">
      <div class="sidebar-header">
        <a href="#" class="sidebar-brand">
          TI<span>To</span> 
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
          <li class="nav-item nav-category">Keluar Barang</li>
          <li class="nav-item">
            <a href="{{route('kembali.user')}}" class="nav-link">
              <i class="link-icon" data-feather="archive"></i>
              <span class="link-title">Pengembalian Barang</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('pinjam.barang')}}" class="nav-link">
              <i class="link-icon" data-feather="inbox"></i>
              <span class="link-title">Peminjaman Barang</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('ambil.barang')}}" class="nav-link">
              <i class="link-icon" data-feather="package"></i>
              <span class="link-title">Pengambilan Barang</span>
            </a>
          </li>
        </ul>
      </div>
    </nav>