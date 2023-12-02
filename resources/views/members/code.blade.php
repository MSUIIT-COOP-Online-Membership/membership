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
@include('guest.header')
    <main>
    <header>
            <h1>Membership Application</h1>
        </header>
        <div class="box-custom">
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
        <div class="box">
    <div class="progress-wrap">
    <div class="step">Verification</div>
    </div>

    <div class="form-container">
        <h1>Please Enter Your Code</h1>
        <form action='code' method="POST" id="form">
            @csrf

            <center>
                <input type="number" name="code"><br>
                <button class="btn btn-next btn-primary">Enter</button>
            </center>
        </form>
    </div>
</div>
</div>
</main>
</body>

<!-- Bootdrap CDN -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    
<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="<?php echo url('theme'); ?>/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?php echo url('theme'); ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo url('theme'); ?>/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo url('theme'); ?>/dist/js/adminlte.js"></script>

</html>