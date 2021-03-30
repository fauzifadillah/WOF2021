<nav class="navbar">
  <a href="#" class="sidebar-toggler">
    <i data-feather="menu"></i>
  </a>
  <div class="navbar-content">
    <div class="search-form">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a href="#" class="nav-link">
            {{-- <span class="font-weight-medium ml-1 mr-1">{{ strtoupper(basename(request()->path())) }}</span> --}}
          </a>
        </li>
      </ul>
    </div>
    <ul class="navbar-nav">
      <li class="nav-item">
        <a onclick="document.getElementById('logout-form').submit();" class="nav-link">
          <i class="link-icon fas fa-sign-out-alt"></i>
          <span>Log Out</span>
        </a>
      </li>
    </ul>
  </div>
</nav>