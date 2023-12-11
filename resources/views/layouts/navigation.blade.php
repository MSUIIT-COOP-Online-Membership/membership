<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
        @if (auth()->user()->id_photo)
            <img src="{{ asset('images/id_photos/' . auth()->user()->id_photo) }}" class="img-circle elevation-2" alt="User Image" width="50" height="50">
        @else
            No photo
        @endif
        </div>
        <div class="info">
            <a href="{{ route('profile.show') }}" class="d-block">{{ auth()->user()->name }}</a>
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
            <a href="{{ route('home') }}" class="nav-link" id="dashboard-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    {{ __('Dashboard') }}
                </p>
            </a>
        </li>

        <!-- <li class="nav-item">
            <a href="#" class="nav-link" id="dashboard-link">
                <i class="nav-icon fas fa-chart-bar"></i>
                <p>
                    {{ __('Analytics') }}
                </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="#" class="nav-link" id="dashboard-link">
                <i class="nav-icon fas fa-clock"></i>
                <p>
                    {{ __('Timeline') }}
                </p>
            </a>
        </li> -->

        <li class="nav-header">CRUD MODELS</li>
            <li class="nav-item">
                <a href="{{ route('users.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        {{ __('Users') }}
                    </p>
                </a>
            </li>

            <li class="nav-item has-treeview">
                <a href="{{ route('branches.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-building"></i>
                    <p>
                        {{ __('Branches') }}
                    </p>
                </a>
            </li>

            <li class="nav-item has-treeview">
                <a href="{{ route('staff.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-user-tie"></i>
                    <p>
                        {{ __('Staff') }}
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('members.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-user-check"></i>
                    <p>
                        {{ __('Members') }}
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('beneficiaries.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-user-shield"></i>
                    <p>
                        {{ __('Beneficiaries') }}
                    </p>
                </a>
            </li>

            <!-- <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-video"></i>
                    <p>
                        {{ __('Webinars') }}
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('webinars.index') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>{{ __('All Webinars') }}</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('webinars.create') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>{{ __('Add Webinar') }}</p>
                        </a>
                    </li>
                </ul>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('webbookings.index') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>{{ __('All Bookings') }}</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('webbookings.create') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>{{ __('Add Booking') }}</p>
                        </a>
                    </li>
                </ul>
            </li> -->

            <li class="nav-item has-treeview">
                <a href="{{ route('evaluations.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-newspaper"></i>
                    <p>
                        {{ __('Evaluations') }}
                    </p>
                </a>
            </li>

            <li class="nav-item has-treeview">
                <a href="{{ route('appointments.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-calendar"></i>
                    <p>
                        {{ __('Appointments') }}
                    </p>
                </a>
            </li>

            <li class="nav-item has-treeview">
                <a href="{{ route('payments.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-money-bill"></i>
                    <p>
                        {{ __('Invoices') }}
                    </p>
                </a>
            </li>

            <li class="nav-item has-treeview">
                <a href="{{ route('applications.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-file-signature"></i>
                    <p>
                        {{ __('Applications') }}
                    </p>
                </a>
            </li>


            <!-- <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon far fa-envelope"></i>
                    <p>
                        {{ __('Mailbox') }}
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon text-primary"></i>
                            <p>{{ __('Inbox') }}</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon text-success"></i>
                            <p>{{ __('Compose') }}</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon text-warning"></i>
                            <p>{{ __('Read') }}</p>
                        </a>
                    </li>
                </ul>
            </li> -->


            <!-- <li class="nav-header">MISCELLANEOUS</li> -->
            <li class="nav-item">
                <a href="{{ route('appointments.calendar') }}" class="nav-link">
                    <i class="nav-icon far fa-calendar-alt"></i>
                    <p>
                    {{ __('Calendar') }}
                        <span class="badge badge-info right"></span>
                    </p>
                </a>
            </li>
            <!-- <li class="nav-item">
                <a href="{{ route('appointments.calendar') }}" class="nav-link">
                    <i class="nav-icon far fa-image"></i>
                    <p>
                    {{ __('Gallery') }}
                        <span class="badge badge-info right"></span>
                    </p>
                </a>
            </li> -->
            <!-- <li class="nav-item">
                <a href="{{ route('about') }}" class="nav-link">
                    <i class="nav-icon far fa-address-card"></i>
                    <p>
                        {{ __('About Us') }}
                    </p>
                </a>
            </li> -->

            <!-- <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-cogs"></i>
                    <p>
                        {{ __('Settings') }}
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon far fa-question-circle"></i>
                    <p>
                        {{ __('FAQs') }}
                    </p>
                </a>
            </li> -->
    
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
<!-- /.sidebar -->

<script>
    $(document).ready(function () {
        // Set the initial active state based on the current page URL
        setActiveState();

        // Handle navigation item click
        $(".nav-link").click(function () {
            // Remove 'active' class from all nav-links
            $(".nav-link").removeClass("active");

            // Add 'active' class to the clicked nav-link
            $(this).addClass("active");
        });

        // Check and set the active state based on the current page URL
        function setActiveState() {
            var currentUrl = window.location.href;

            // Iterate through each nav-link
            $(".nav-link").each(function () {
                var href = $(this).attr("href");

                // Check if the current URL contains the href of the nav-link
                if (currentUrl.indexOf(href) !== -1) {
                    $(this).addClass("active");
                }
            });
        }
    });
</script>

