  <!-- Main Sidebar Container -->
  <aside class="main-sidebar elevation-4 sidebar-light-olive" >
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link d-flex">
      <span class="brand-text font-weight-bold ml-3"> Admin Dashboard</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('Dashboard')}}/dist/img/user2-160x160.jpg" class="img-circle elevation-2">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ route('admin.home') }}" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Category
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route ('category.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Primary Category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route ('subcategory.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sub Category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route ('childcategory.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Child Category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route ('brand.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Brands</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-header">Profile</li>
          <li class="nav-item">
            <a href="{{ route('admin.logout') }}" class="nav-link">
              <i class="nav-icon far fa-circle text-info"></i>
              <p class="text">Logout</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
<!-- /.Main Sidebar Container -->