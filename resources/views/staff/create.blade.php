@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create Staff') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('staff.store') }}" enctype="multipart/form-data">
                            @csrf

                            <!-- Last Name -->
                            <div class="form-group">
                                <label for="lname">Last Name</label>
                                <input type="text" class="form-control" id="lname" name="lname" required>
                            </div>

                            <!-- Middle Name -->
                            <div class="form-group">
                                <label for="mname">Middle Name</label>
                                <input type="text" class="form-control" id="mname" name="mname">
                            </div>

                            <!-- First Name -->
                            <div class="form-group">
                                <label for="fname">First Name</label>
                                <input type="text" class="form-control" id="fname" name="fname" required>
                            </div>

                            <!-- Suffix -->
                            <div class="form-group">
                                <label for="suffix">Suffix</label>
                                <input type="text" class="form-control" id="suffix" name="suffix">
                            </div>

                            <!-- Sex -->
                            <div class="form-group">
                                <label for="sex">Sex</label>
                                <select class="form-control" id="sex" name="sex" required>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <!-- Add more options if needed -->
                                </select>
                            </div>

                            <!-- Civil Status -->
                            <div class="form-group">
                                <label for="civil_status">Civil Status</label>
                                <select class="form-control" id="civil_status" name="civil_status" required>
                                    <option value="single">Single</option>
                                    <option value="married">Married</option>
                                    <option value="widow">Widow</option>
                                    <!-- Add more options if needed -->
                                </select>
                            </div>

                            <!-- Date of Birth -->
                            <div class="form-group">
                                <label for="dob">Date of Birth</label>
                                <input type="date" class="form-control" id="dob" name="dob">
                            </div>

                            <!-- Age -->
                            <div class="form-group">
                                <label for="age">Age</label>
                                <input type="number" class="form-control" id="age" name="age">
                            </div>

                            <!-- Telephone Number -->
                            <div class="form-group">
                                <label for="tel_no">Telephone Number</label>
                                <input type="tel" class="form-control" id="tel_no" name="tel_no">
                            </div>

                            <!-- Mobile Number -->
                            <div class="form-group">
                                <label for="mobile_no">Mobile Number</label>
                                <input type="tel" class="form-control" id="mobile_no" name="mobile_no">
                            </div>

                            <!-- Email -->
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email">
                            </div>

                            <!-- Present Address -->
                            <div class="form-group">
                                <label for="present_address">Present Address</label>
                                <textarea class="form-control" id="present_address" name="present_address"></textarea>
                            </div>

                            <!-- Position -->
                            <div class="form-group">
                                <label for="position">Position</label>
                                <select class="form-control" id="position" name="position" required>
                                    <option value="manager">Manager</option>
                                    <option value="supervisor">Supervisor</option>
                                    <option value="staff">Staff</option>
                                    <!-- Add more options if needed -->
                                </select>
                            </div>

                            <!-- ID Photo -->
                            <div class="form-group">
                                <label for="id_photo">ID Photo</label>
                                <input type="file" class="form-control-file" id="id_photo" name="id_photo">
                            </div>

                            <button type="submit" class="btn btn-primary">Create Staff</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
