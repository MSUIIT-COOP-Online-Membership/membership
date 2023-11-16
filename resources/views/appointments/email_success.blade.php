<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NMPC Membership Application</title>
    <link rel="stylesheet" href="{{ asset('/assets/css/membership.css'); }}">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
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

        <div class="box">
            <!-- progressive bar -->
            <div class="progress-wrap">
                <div class="progress-bar">Your Data</div>
            </div>

            <div class="form-container">
                    <div class="tabpanel show">

                        <div class="tab-header">
                        </div>
                        <div class="fields">
                            Success! Please check your email. Thank you for your patience.
                        </div>
                    </div>
            </div>
        </div>
    </main>

</body>

</html>