<aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <!-- <a href="../../index3.html" class="brand-link">
      <img src="{{ asset('adminlte/dist/img/laudry1.jpg') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="d-blok">LAUDRY</span>
    </a> -->

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('adminlte/dist/img/admin.png') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">KING LAUNDRY</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="/dashboard/admin" class="nav-link">
              <i class="nav-icon fas fa-sharp fa-solid fa-user-tie"></i>
              <p>
                Admin
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/dashboard/kasir" class="nav-link">
              <i class="nav-icon fas fa-sharp fa-solid fa-user-tie"></i>
              <p>
                Kasir
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/dashboard/owner" class="nav-link">
              <i class="nav-icon fas fa-sharp fa-solid fa-user-tie"></i>
              <p>
                Owner
              </p>
            </a>
          </li>
        
          <!-- <li class="nav-header">WILAYAH OUTLET NICH</li>
          <li class="nav-item">
            <a href="/outlet" class="nav-link">
              <i class="nav-icon far fa-building"></i>
              <p>
                Outlet
              </p>
            </a>
          </li>

          <li class="nav-header">WILAYAH PAKET NICH</li>
          <li class="nav-item">
            <a href="/paket" class="nav-link">
              <i class="nav-icon fas  fa-swatchbook"></i>
              <p>
                Paket
              </p>
            </a>
          </li>

          <li class="nav-header">WILAYAH MEMBER NICH</li>
          <li class="nav-item">
            <a href="/member" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Member
              </p>
            </a>
          </li>

          <li class="nav-header">WILAYAH TRANSAKSI NICH</li>
          <li class="nav-item">
            <a href="/transaksi" class="nav-link">
              <i class="nav-icon fas fa-money-check"></i>
              <p>
                Transaksi
              </p>
            </a>
          </li> -->
          <br>
         
            <li class="nav-item">
                <a href="{{ route('logout.admin') }}" class="nav-link">
                  <i class="nav icon fas fa-sign-out-alt"> Logout </i>
                </a>
              </li>
          </li>
        </ul>
      </nav>
        
</div>
    <!-- /.sidebar -->
  </aside>