<div class="header-logo  navbar-expand-lg ">
        <a href="">
              <img src="{{ asset('images/msuiitcoop-logo.png') }}" alt="MSUIIT COOP"
                 class="brand-image img-circle elevation-4"
                 style="opacity: 1; width: 70px; height:70px;">
            <div class="brand-text"> <!-- Add some margin to separate the image and text -->
                <p class=" font-weight-bolder">MSU-IIT NATIONAL MULTI-PURPOSE COOPERATIVE</p>
                <p class="brand-slogan"> Join Us Grow With Us!</p>
            </div>
        </a>
</div>

<div class="header-bottom navbar navbar-expand-md ">
   
    <button class="navbar-toggler nav-toggle-cutom ml-auto " type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"><i class='bx bx-menu'></i></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">

        @if (Route::has('login'))
            <ul class="navbar-nav mx-auto custom-nav text-center">
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