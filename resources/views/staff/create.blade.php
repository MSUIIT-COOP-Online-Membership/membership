<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff / Create</title>
</head>
<body>
@extends('layouts.app')

    @section('content')

    <!-- Content Header (Page header) -->
<section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create Staff Member</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('staff.index') }}">Staff</a></li>
                        <li class="breadcrumb-item active">Create</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header bg-dark text-white">
                            <h7 class="mb-0">{{ __('Please input fields to add staff member.') }}</h7>
                        </div>

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
                                    <option value="" disabled selected>Select Sex</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <!-- Add more options if needed -->
                                </select>
                            </div>

                            <!-- Civil Status -->
                            <div class="form-group">
                                <label for="civil_status">Civil Status</label>
                                <select class="form-control" id="civil_status" name="civil_status" required>
                                    <option value="" disabled selected>Select Civil Status</option>
                                    <option value="Single">Single</option>
                                    <option value="Married">Married</option>
                                    <option value="Widow">Widow</option>
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
                                <label for="position">Professional Position</label>
                                <select class="form-control" id="position" name="position" required>
                                <option value="" disabled selected>Select Position</option>
                                    <option value="System Administrator">System Administrator</option>
                                    <option value="Chairperson">Chairperson</option>
                                    <option value="Vice-Chairperson">Chairperson</option>
                                    <option value="Board Director">Board Director</option>
                                    <option value="Board Secretary">Board Secretary</option>
                                    <option value="Board Secretary">Board Treasurer</option>
                                    <option value="Ex-Officio Member">Ex-Officio Member</option>
                                    <option value="Chief Executive Officer">Chief Executive Officer</option>
                                    <option value="Audit Committee">Audit Committee</option>
                                    <option value="Election  Committee">Election Committee</option>
                                    <option value="Gender and Development Committee">Gender and Development Committee</option>
                                    <option value="Conciliation and Mediation Committee">Conciliation and Mediation Committee</option>
                                    <option value="Conciliation and Mediation Committee">Conciliation and Mediation Committee</option>
                                    <option value="Ethics Committee">Ethics Committee</option>
                                    <option value="Staff Member">Staff Member</option>
                                </select>
                            </div>

                            <!-- ID Photo -->
                            <div class="form-group">
                                <label for="id_photo">{{ __('ID Photo') }}</label>
                                <input type="file" id="id_photo" name="id_photo" class="form-control-file" accept="image/*">
                                <small class="form-text text-muted">Upload a formal ID photo.</small>
                            </div><br>

                            <div class="form-group">
                                <div class="d-flex justify-content-between">
                                    <a href="{{ route('staff.index') }}" class="btn btn-danger"><i class="fas fa-times-circle mr-1"></i>{{ __('Cancel') }}</a>
                                    <div>
                                        <button type="reset" class="btn btn-warning"><i class="fas fa-sync-alt mr-1"></i>{{ __('Reset') }}</button>
                                        <button type="submit" class="btn btn-primary"><i class="fas fa-check-circle mr-1"></i>{{ __('Create Staff') }}</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
</body>
</html>