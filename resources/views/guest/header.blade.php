<div class="header-logo  navbar-expand-lg ">
    <a href="/" class="row align-items-center justify-content-center">
        <img src="{{ asset('images/msuiitcoop-logo.png') }}" alt="MSUIIT COOP"
             class="brand-image img-circle elevation-4"
             style="opacity: 1; width: 70px; height:70px;">
        <div class="ml-4 text-left"> <!-- Add some margin to separate the image and text -->
            <span class="brand-text font-weight-bolder">MSU-IIT NATIONAL MULTI-PURPOSE COOPERATIVE</span> <br>
            <span>Join Us Grow With Us!</span>
        </div>
    </a>
</div>

<div class="header-bottom navbar navbar-expand-lg justify-content-center">
    <div>
        @if (Route::has('login'))
            <ul class="nav custom-nav justify-content-between">
                @auth
                    <li class="nav-item"><a class="nav-link" href="{{ url('/home') }}">Home</a></li>

                    @else
                    <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">About Us</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('premembershipform.index') }}">Membership</a></li>
                    
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                    @if (Route::has('register'))

                     <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                  @endif
                @endauth
            </ul>
        @endif

    </div>
</div> 