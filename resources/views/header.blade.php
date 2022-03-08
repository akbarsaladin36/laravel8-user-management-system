<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        @if (Session::exists('user'))
          <a class="navbar-brand" href="/home">User Management System</a>
        @endif
        @if (Session::exists('admin'))
          <a class="navbar-brand" href="/admin/dashboard">User Management System</a>
        @endif
        @if (!Session::exists('user') && !Session::exists('admin'))
          <a class="navbar-brand" href="/">User Management System</a>    
        @endif
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        @if (Session::get('user'))
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="{{ route('profile.user') }}">Profile</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="{{ route('user.logout') }}">Logout</a>
            </li>
          </ul>
        @endif
        @if (Session::get('admin'))
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="{{ route('all-users.admin') }}">All Users</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="{{ route('all-notes.admin') }}">All Notes</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="{{ route('all-attendances.admin') }}">All Attendances</a>
            </li>
          </ul>
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="#">Profile</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="{{ route('admin.logout') }}">Logout</a>
            </li>
          </ul>
        @endif
        @if (!Session::get('user') && !Session::get('admin'))
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="{{ route('auth.login.index') }}">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('auth.register.index') }}">Register</a>
            </li>
          </ul>
        @endif
      </div>
    </div>
  </nav>