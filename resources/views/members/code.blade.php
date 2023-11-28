<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NMPC Membership Application</title>
    <link rel="stylesheet" href="{{ asset('/assets/membershipapplication/css/membership.css'); }}">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <style>
        input{
            width:50%;
            height:40px;
            font-size: 20px;
            margin-bottom: 20px;
        }

        h1{
            text-align: center;
            margin-bottom:15px;
        }
    </style>
</head>
<body>
    <main>
    <header>
            <h1>Membership Application</h1>
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
        <div class="box">
    <div class="progress-wrap">
    <div class="progress-bar ">Verification</div>
    </div>

    <div class="form-container">
        <h1>Please Enter Your Code</h1>
        <form action='code' method="POST" id="form">
            @csrf

            <center>
            <input type="number" name="code"><br>
            <button class="btn btn-next">Enter</button>
</center>
        </form>
    </div>
</div>
</main>
</body>
</html>