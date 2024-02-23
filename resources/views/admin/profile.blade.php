<ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
    @if(session()->has('fullName'))
        {{ session('fullName') }}
    @elseif(Auth::check())
        {{ Auth::user()->name }}
    @endif
    <li class="nav-item dropdown">
      <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
        aria-expanded="false">
        <img src="{{ asset('assets/images/profile/user-1.jpg') }}" alt="" width="35" height="35" class="rounded-circle">
      </a>
      <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
        <div class="message-body">
          <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
            <i class="ti ti-lock fs-6"></i>
            <p class="mb-0 fs-3">Change Password</p>
          </a>

          <a href="{{ route('personnel.logout') }}" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
        </div>
      </div>
    </li>
</ul>