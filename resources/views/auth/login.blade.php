
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{URL::to('css/login.css')}}">
</head>
<body>
    @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
    @endif

    <div class="container">
        <div class="myCard">
            <div class="row">
                <div class="col-md-6">
                    <div class="myLeftCtn">
                        <div class="login-logo text-center">
                            <a href="/">{{ config('app.name', 'Laravel') }}</a>
                        </div> 
                        <form method="POST" action="{{ route('login') }}" class="myForm text-center">
                            @csrf
                            

                            <header>LOGIN</header>

                            @if ($errors->any())
                                @foreach ($errors->all() as $error)
                                    <p class = error-msg>{{ $error }}</p>
                                @endforeach
                            @endif
                            <div class="form-group">
                                <div class="input-container">
                                    <i class="fas fa-envelope"></i>
                                    <input class="myInput" 
                                    placeholder="{{ __('Email') }}" 
                                    id="email" type="email" 
                                    name="email" :value="old('email')" 
                                    required autofocus 
                                    autocomplete="username" />
                                </div>
                                
                            </div>
                            
                            <div class="form-group">
                                <div class="input-container">
                                    <i class="fas fa-lock"></i>
                                    <input class="myInput" 
                                    placeholder="Password" 
                                    id="password" type="password" 
                                    name="password" 
                                    required 
                                    autocomplete="current-password" />
                                </div>
                                
                            </div>

                            <div class="block mt-4" style="text-align: left;"> 
                                <label for="remember_me" class="flex items-center">
                                    <input type="checkbox" id="remember" name="remember">
                                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                                </label>
                            </div>
    
                            <div class="block" style="text-align: left;"> 
                                @if (Route::has('password.request'))
                                    <p class="mb-1">
                                        <a href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    </p>
                                @endif
                            </div>

                            <button type="submit" class="butt mt-4">
                                {{ __('Login') }}
                            </button>

                        </form>
                    </div>
                </div> 
                <div class="col-md-6">
                    <div class="myRightCtn">
                        <div class="gradient"></div>
                            <div class="box">
                                <header><img src="{{ URL('images/npmc-logo-nobg.png')}}" alt=""></header>
                            <p>
                                Head Office: Gregorio T. Lluch Sr. Ave., Pala-o Iligan City, 9200, Philippines <br>
                                Phone: (063) 223-5874 <br>
                                Email: msuiitnmpc@msuiitcoop.org <br>
                                Webmail, HR Max, IT support desk, e-Survey
                            </p>
                                <!-- <input type="button" class="butt_out" value="Learn More"/> -->
                                <a href="https://msuiitcoop.org/about.php" class="butt_out">Learn More</a>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
      
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

@include('sweetalert::alert')
</body>
</html>
