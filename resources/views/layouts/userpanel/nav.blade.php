<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{ asset('images/id_photos/' . auth()->user()->id_photo) }}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">{{ auth()->user()->name }}</a>
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
            <a href="{{ route('home') }}" class="nav-link active" id="dashboard-link">
                <i class="nav-icon fas fa-th-large "></i>
                <p>
                    {{ __('Dashboard') }}
                </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="#" class="nav-link" id="dashboard-link">
                <i class="nav-icon fas fa-chart-bar"></i>
                <p>
                    {{ __('Analytics') }}
                </p>
            </a>
        </li>

        <li class="nav-header"><hr></li>
            <li class="nav-item">
                <a href="{{ route('userprofile.show') }}" class="nav-link">
                    <i class="nav-icon fas fa-user"></i>
                    <p>
                        {{ __('Profile') }}
                    </p>
                </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('users.index') }}" class="nav-link">
                  <i class="nav-icon fas fa-users"></i>
                  <p>
                      {{ __('Membership') }}
                  </p>
              </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('users.index') }}" class="nav-link">
                <i class="nav-icon fas fa-hand-holding-heart"></i>
                <p>
                    {{ __('Benefits') }}
                </p>
            </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('users.index') }}" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                  {{ __('Events') }}
              </p>
          </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('users.index') }}" class="nav-link">
            <i class="nav-icon fas fa-comments"></i>
            <p>
                {{ __('Community') }}
            </p>
        </a>
    </li>
    <li class="nav-item">
      <form method="POST" action="{{ route('logout') }}">
          @csrf
          <a href="{{ route('logout') }}" class="nav-link"
          onclick="event.preventDefault(); this.closest('form').submit();">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
              {{ __('Log Out') }}
              </p>
          </a>
      </form>
    </li>
  </ul>
  </nav>
  <!-- /.sidebar-menu -->
</div>

