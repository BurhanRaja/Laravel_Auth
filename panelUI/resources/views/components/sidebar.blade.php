  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
          <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
              class="brand-image img-circle elevation-3" style="opacity: .8">
          @if (auth('admin')->user())
              <span class="brand-text font-weight-light">Admin Dashboard</span>
          @else
              <span class="brand-text font-weight-light">User Dashboard</span>
          @endif
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              <div class="image">
                  <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
              </div>
              <div class="info">
                  @if (auth('admin')->user())
                      <a href="#" class="d-block">{{ auth('admin')->user()->name }}</a>
                  @else
                      <a href="#" class="d-block">{{ auth()->user()->name }}</a>
                  @endif
              </div>
          </div>

          <!-- SidebarSearch Form -->
          <div class="form-inline">
            <form action="" method="post">
              <div class="input-group" data-widget="sidebar-search">
                  <input class="form-control form-control-sidebar" id="allSearch" type="search" placeholder="Search"
                  aria-label="Search">
                  <div class="input-group-append">
                </div>
            </div>
        </form>
          </div>

          <!-- Sidebar Menu -->
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                  data-accordion="false">
                  <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                  <li class="nav-item">
                      <a class="nav-link {{ 'dashboard' == request()->path() ? 'active' : '' }}" href="/dashboard">
                          <i class="nav-icon fas fa-tachometer-alt"></i>
                          <p>
                              Home
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link {{ 'dashboard/products' == request()->path() ? 'active' : '' }}"
                          href="/dashboard/products">
                          <i class="nav-icon fas fa-store-slash"></i>
                          <p>
                              Products
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link {{ 'dashboard/customers' == request()->path() ? 'active' : '' }}"
                          href="/dashboard/customers">
                          <i class="nav-icon fas fa-th"></i>
                          <p>
                              Customers
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link {{ 'dashboard/messages' == request()->path() ? 'active' : '' }}"
                          href="/dashboard/messages">
                          <i class="nav-icon fas fa-copy"></i>
                          <p>
                              Messages
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link  {{ 'dashboard/salesandrevenue' == request()->path() ? 'active' : '' }}"
                          href="/dashboard/salesandrevenue">
                          <i class="nav-icon fas fa-chart-pie"></i>
                          <p>
                              Sales and Revenue
                          </p>
                      </a>

                  <li class="nav-item">
                      <a href="#" class="nav-link">
                          <i class="nav-icon far fa-plus-square"></i>
                          <p>
                              Leads
                              <i class="fas fa-angle-left right"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview pl-4">
                        <li class="nav-item">
                            <a href="/dashboard/create/leads" class="nav-link {{'dashboard/create/leads' === request()->path() ? 'active' : ''}}">
                              <p>Create Lead</p>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a href="/dashboard/leads" class="nav-link  {{'dashboard/leads' === request()->path() ? 'active' : ''}}">
                              <p>View Leads</p>
                            </a>
                          </li>
                      </ul>
                          <li class="nav-item">
                              <a class="nav-link {{ 'dashboard/contacts' == request()->path() ? 'active' : '' }}"
                                  href="/dashboard/contacts">
                                  <i class="nav-icon fas fa-tree"></i>
                                  <p>
                                      Contacts
                                  </p>
                              </a>
                          </li>
                          @if (auth('admin')->user()->can('show-permissions'))
                              <li class="nav-item">
                                  <a class="nav-link {{ 'dashboard/permissions' == request()->path() ? 'active' : '' }}"
                                      href="/dashboard/permissions">
                                      <i class="nav-icon fas fa-tree"></i>
                                      <p>
                                          Permissions
                                      </p>
                                  </a>
                              </li>
                          @endif
                          @if (auth('admin')->user()->can('show-roles'))
                              <li class="nav-item">
                                  <a class="nav-link {{ 'dashboard/roles' == request()->path() ? 'active' : '' }}"
                                      href="/dashboard/roles">
                                      <i class="nav-icon fas fa-tree"></i>
                                      <p>
                                          Roles
                                      </p>
                                  </a>
                              </li>
                          @endif
                          @if (auth('admin')->user()->can('show-admin-user'))
                              <li class="nav-item">
                                  <a class="nav-link {{ 'dashboard/createadmins' == request()->path() ? 'active' : '' }}"
                                      href="/dashboard/createadmins">
                                      <i class="nav-icon fas fa-tree"></i>
                                      <p>
                                          Admin Users
                                      </p>
                                  </a>
                              </li>
                          @endif
                      </ul>
          </nav>
          <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
  </aside>
