<nav class="sidebar">
    <div class="sidebar-header">
      <a href="#" class="sidebar-brand">
        <img src="/css/assets/logo.svg" alt="logo" width="30" height="30"> WOF<span>2021</span>
      </a>
      <div class="sidebar-toggler not-active">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
    <div class="sidebar-body">
      <ul class="nav">
        <li class="nav-item {{ active_class(['/']) }}">
          <a href="{{ url('/') }}" class="nav-link">
            <i class="link-icon fas fa-home"></i>
            <span class="link-title">Dashboard</span>
          </a>
        </li>
        <li class="nav-item {{ active_class(['event']) }}">
          <a href="{{ url('event') }}" class="nav-link">
            <i class="link-icon fas fa-calendar-alt"></i>
            <span class="link-title">Event</span>
          </a>
        </li>
        <li class="nav-item {{ active_class(['point']) }}">
          <a href="{{ url('/point') }}" class="nav-link">
            <i class="link-icon fas fa-trophy"></i>
            <span class="link-title">Point</span>
          </a>
        </li>
        <li class="nav-item {{ active_class(['voucher']) }}">
          <a href="{{ url('/voucher') }}" class="nav-link">
            <i class="link-icon fas fa-money-bill-wave-alt"></i>
            <span class="link-title">Voucher</span>
          </a>
        </li>
        <li class="nav-item {{ active_class(['account']) }}">
          <a href="{{ url('/account') }}" class="nav-link">
            <i class="link-icon fas fa-users"></i>
            <span class="link-title">Account</span>
          </a>
        </li>
      </ul>
    </div>
  </nav>