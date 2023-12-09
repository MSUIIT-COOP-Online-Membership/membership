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
                <div class="step">Your Data</div>
            </div>

            <div class="form-container">
                <form method="POST" action="/bookappointment" enctype="multipart/form-data" id="form">
                    @csrf

                    <!-- Welcome Page -->
                    <div class="tabpanel show">

                        <!-- Personal Information -->
                        <div class="tab-header">
                            <h1>Submission Appointment</h1>
                        </div>
                        <div class="fields">

                        @foreach($members as $index => $members)
                                <input type="hidden" name="member_id" class="form-input" id="member_id" value='{{ $members->id }}' readonly>
                                <input type="hidden" name="member_email" class="form-input" id="member_email" value='{{ $members->email }}' readonly>


                            <div class="input-group">
                                <label for="lname">Last Name</label>
                                <input type="text" name="lname" class="form-input" id="lname" value='{{ $members->lname }}' readonly>
                            </div>
                            <div class="col">
                                <div class="input-group">
                                    <input type="hidden" name="member_email" class="form-input" id="member_email" value='{{ $members->email }}' readonly>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="input-group">
                                    <label for="lname">Last Name</label>
                                    <input type="text" name="lname" class="form-input" id="lname" value='{{ $members->lname }}' readonly>
                                </div>
                            </div>
                        @endforeach
                            <div class="input-group">
                                <label for="branch">Branch</label>
                                <select name="branch" id="branch">
                                    <option value="">Choose a Branch</option>
                                    @foreach ($branch as $branch)
                                        <option value="{{$branch->id}}">{{$branch->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <label for="subject">Subject</label>
                                    <input type="text" name="subject" class="form-input" id="subject" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="input-group">
                                    <label for="date">Date</label>
                                    <input type="date" name="date" class="form-input" id="date" required>
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group">
                                    <label for="start_time">Start Time</label>
                                    <input type="time" name="start_time" class="form-input" id="start_time" required>
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group">
                                    <label for="end_time">End Time</label>
                                    <input type="time" name="end_time" class="form-input" id="end_time" required>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button class="btn btn-next btn-primary mt-4">Submit</button>
                        </div>
                            
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>

</body>

</html>