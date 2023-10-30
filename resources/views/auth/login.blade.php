<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{URL::to('css/signin.css')}}">
</head>
<body>
    @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
    @endif

    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #cce8fc;">
        <a class="navbar-brand" href="{{ url('/') }}">MSU-IIT NMPC</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
          <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
              <a class="nav-link" href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Membership</a>
            </li>
          </ul>
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">Register</a>
            </li>
        </ul>
        </div>
      </nav>

    <div class="container">
        <div class="myCard">
            <div class="row">
                <div class="col-md-6">
                    <div class="myLeftCtn"> 
                        <form method="POST" action="{{ route('login') }}" class="myForm text-center">
                            @csrf
                            <header>LOGIN</header>

                            <div class="form-group">
                                <div class="input-container">
                                    <i class="fas fa-envelope"></i>
                                    <input class="myInput" placeholder="Email" id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="input-container">
                                    <i class="fas fa-lock"></i>
                                    <input class="myInput" placeholder="Password" id="password" type="password" name="password" required autocomplete="current-password" />
                                </div>
                            </div>

                            <div class="block mt-4" style="text-align: left;"> 
                                <label for="remember_me" class="flex items-center">
                                    <x-checkbox id="remember_me" name="remember" />
                                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                                </label>
                            </div>
    
                            <div class="block" style="text-align: left;"> 
                                @if (Route::has('password.request'))
                                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                                        {{ __('Forgot your password?') }}
                                    </a>
                                @endif
                            </div>

                            <x-button class="butt mt-4">
                                {{ __('Log in') }}
                            </x-button>
                        </form>
                    </div>
                </div> 
                <div class="col-md-6">
                    <div class="myRightCtn">
                        <div class="gradient"></div>
                            <div class="box">
                                <header><img src="{{ URL('img/logo.png')}}" alt=""></header>
                            <p>
                                Head Office: Gregorio T. Lluch Sr. Ave., Pala-o Iligan City, 9200, Philippines <br>
                                Phone: (063) 223-5874 <br>
                                Email: msuiitnmpc@msuiitcoop.org <br>
                                Webmail, HR Max, IT support desk, e-Survey
                            </p>
                                <input type="button" class="butt_out" value="Learn More"/>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
      
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
 
</body>
</html>

