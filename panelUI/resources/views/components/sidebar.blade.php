  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
          <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
              style="opacity: .8">
          <span class="brand-text font-weight-light">Dashboard</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              <div class="image">
                  <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
              </div>
              <div class="info">
                  <a href="#" class="d-block">Burhanuddin Raja</a>
              </div>
          </div>

          <!-- SidebarSearch Form -->
          <div class="form-inline">
              <div class="input-group" data-widget="sidebar-search">
                  <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                      aria-label="Search">
                  <div class="input-group-append">
                      <button class="btn btn-sidebar">
                          <i class="fas fa-search fa-fw"></i>
                      </button>
                  </div>
              </div>
          </div>

          <!-- Sidebar Menu -->
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                  data-accordion="false">
                  <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                  <li class="nav-item">
                      <a class="nav-link {{ '/' == request()->path() ? 'active' : '' }}" href="/">
                          <i class="nav-icon fas fa-tachometer-alt"></i>
                          <p>
                              Home
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link {{ 'products' == request()->path() ? 'active' : '' }}" href="/products">
                        <i class="nav-icon fas fa-store-slash"></i>
                          <p>
                              Products
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link {{ 'customers' == request()->path() ? 'active' : '' }}" href="/customers">
                          <i class="nav-icon fas fa-th"></i>
                          <p>
                              Customers
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link {{ 'messages' == request()->path() ? 'active' : '' }}" href="/messages">
                          <i class="nav-icon fas fa-copy"></i>
                          <p>
                              Messages
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link  {{ 'salesandrevenue' == request()->path() ? 'active' : '' }}" href="/salesandrevenue">
                          <i class="nav-icon fas fa-chart-pie"></i>
                          <p>
                              Sales and Revenue
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link {{ 'contacts' == request()->path() ? 'active' : '' }}" href="/contacts">
                          <i class="nav-icon fas fa-tree"></i>
                          <p>
                              Contacts
                          </p>
                      </a>
                  </li>
              </ul>
          </nav>
          <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
  </aside>
