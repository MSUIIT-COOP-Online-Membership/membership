<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NMPC Membership Application</title>
    <link rel="stylesheet" href="{{ asset('/assets/premembershipform/css/premembership.css'); }}">
    <!-- <link rel="stylesheet" href="{{ asset('/assets/membershipapplication/css/membership.css'); }}"> -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">

    <link rel="stylesheet" href="{{ asset('/assets/premembershipform/css/header.css'); }}">
    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

</head>

<body>
@include('guest.head')
    <main>
        <header>
            <h1>Set Appointment</h1>
        </header>
        <div>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>

        <div class="box-custom">
            <!-- progressive bar -->
            <div class="progress-wrap">
                <div class="step">Notification</div>
            </div>

            <div class="form-container">
                    <div class="tabpanel show">

                        <div class="tab-header text-center p-4">
                            <p >Success! Please check your email. Thank you for your patience.</p>
                        </div>
                        <div class="text-center">
                            
                        </div>
                    </div>
            </div>
        </div>
    </main>

</body>

</html>