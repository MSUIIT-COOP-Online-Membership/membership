<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NMPC Membership Application</title>
    <link rel="stylesheet" href="{{ asset('/assets/membershipapplication/css/membership.css'); }}">
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
                <form method="POST" action="/bookappointment" enctype="multipart/form-data" id="form">
                    @csrf

                    <!-- Welcome Page -->
                    <div class="tabpanel show">

                        <!-- Personal Information -->
                        <div class="tab-header">
                            <h1>Submission Appointment</h1>
                        </div>
                        <div class="fields">
                                <input type="hidden" name="member_id" class="form-input" id="member_id" value='{{ $members->id }}' readonly>
                                <input type="hidden" name="member_email" class="form-input" id="member_email" value='{{ $members->email }}' readonly>


                            <div class="input-group">
                                <label for="lname">Last Name</label>
                                <input type="text" name="lname" class="form-input" id="lname" value='{{ $members->lname }}' readonly>
                            </div>

                            <div class="input-group">
                                <label for="fname">First Name</label>
                                <input type="text" name="fname" class="form-input" id="fname" value='{{ $members->fname }}' readonly>
                            </div>

                            <div class="input-group">
                                <label for="mname">Middle Name</label>
                                <input type="text" name="mname" class="form-input" id="mname" value='{{ $members->mname }}' readonly>
                            </div>

                            <div class="input-group">
                                <label for="branch">Branch</label>
                                <select name="branch" id="branch">
                                    <option value="">Choose a Branch</option>
                                    @foreach ($branch as $branch)
                                        <option value="{{$branch->id}}">{{$branch->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="input-group">
                                <label for="subject">Subject</label>
                                <input type="text" name="subject" class="form-input" id="subject" required>
                            </div>

                            <div class="input-group">
                                <label for="date">Date</label>
                                <input type="date" name="date" class="form-input" id="date" required>
                            </div>

                            <div class="input-group">
                                <label for="start_time">Start Time</label>
                                <input type="time" name="start_time" class="form-input" id="start_time" required>
                            </div>

                            <div class="input-group">
                                <label for="end_time">End Time</label>
                                <input type="time" name="end_time" class="form-input" id="end_time" required>
                            </div>
                            <button>Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>

</body>

</html>