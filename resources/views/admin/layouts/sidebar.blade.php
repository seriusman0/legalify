<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.index') }}" class="brand-link">
      <img src="{{ asset('assets/icons/logo1.jpeg') }}" alt="Legalify Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Legalify</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
        <img src="{{ asset('storage/' . Auth::user()->profile_picture) }}" 
                         alt="" 
                         class="img-circle elevation-2"
                         style="width: 30px; height: 30px; object-fit: cover; margin-right: 5px;">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="{{ route('admin.index') }}" class="nav-link {{ request()->routeIs('admin.index') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.blogs.index') }}" class="nav-link {{ request()->routeIs('admin.blogs.*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-newspaper"></i>
              <p>Blog</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('users.index') }}" class="nav-link {{ request()->routeIs('users.*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-users"></i>
              <p>Users</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.messages.index') }}" class="nav-link {{ request()->routeIs('admin.messages.*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-envelope"></i>
              <p>
                Pesan
                @php
                    $unreadCount = \App\Models\Message::where('status', 'unread')->count();
                @endphp
                @if($unreadCount > 0)
                    <span class="badge badge-danger right">{{ $unreadCount }}</span>
                @endif
              </p>
            </a>
          </li>

          <li class="nav-item {{ request()->routeIs('admin.service*') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ request()->routeIs('admin.service*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-briefcase"></i>
              <p>
                Layanan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.services.index') }}" class="nav-link {{ request()->routeIs('admin.services.index') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daftar Layanan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.service-categories.index') }}" class="nav-link {{ request()->routeIs('admin.service-categories.*') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kategori Layanan</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
    </div>
</aside>
