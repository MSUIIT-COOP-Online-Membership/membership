<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff / Update</title>
</head>
<body>

@extends('layouts.app')

@section('content')
<section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Update Staff Member</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('staff.index') }}">Staff</a></li>
                        <li class="breadcrumb-item active">Update</li>
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
                            <h7 class="mb-0">{{ __('Please input fields to update staff member.') }}</h7>
                        </div>

                        <div class="card-body">
                        <form method="POST" action="{{ route('staff.update', $staff->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <!-- Display current photo if available -->
                            @if ($staff->id_photo)
                                <img src="{{ asset('images/id_photos/' . $staff->id_photo) }}" alt="ID Photo" class="img-fluid rounded-circle mx-auto d-block" style="max-width: 150px; max-height: 150px;">
                            @else
                                <div class="bg-light d-flex justify-content-center align-items-center rounded-circle mx-auto" style="width: 150px; height: 150px;">
                                    <span class="text-muted">No ID Photo</span>
                                </div>
                            @endif

                            <div class="text-center mt-3">
                                <label for="id_photo" class="btn btn-primary">
                                    <i class="fas fa-upload"></i> New ID Photo
                                    <input type="file" id="id_photo" name="id_photo" class="form-control-file" style="display: none;" onchange="displayFileName()">
                                </label><p id="selectedFileName" class="mt-2"><small class="form-text text-muted">Upload a formal ID photo.</small></p>  
                            </div>

                            <!-- JavaScript to update the selected file name -->
                            <script>
                                function displayFileName() {
                                    const fileInput = document.getElementById('id_photo');
                                    const fileNameDisplay = document.getElementById('selectedFileName');

                                    // Check if a file is selected
                                    if (fileInput.files.length > 0) {
                                        // Update the text content with the selected file name
                                        fileNameDisplay.textContent = fileInput.files[0].name;
                                    } else {
                                        // If no file is selected, clear the text content
                                        fileNameDisplay.textContent = '';
                                    }
                                }
                            </script>

                            <hr class="solid" style="border-top: 3px solid #bbb"><br>

                            <!-- Last Name -->
                            <div class="form-group">
                                <label for="lname">Last Name</label>
                                <input type="text" class="form-control" id="lname" name="lname" value="{{ $staff->lname }}">
                            </div>

                            <!-- Middle Name -->
                            <div class="form-group">
                                <label for="mname">Middle Name</label>
                                <input type="text" class="form-control" id="mname" name="mname" value="{{ $staff->mname }}">
                            </div>

                            <!-- First Name -->
                            <div class="form-group">
                                <label for="fname">First Name</label>
                                <input type="text" class="form-control" id="fname" name="fname" value="{{ $staff->fname }}">
                            </div>

                            <!-- Suffix -->
                            <div class="form-group">
                                <label for="suffix">Suffix</label>
                                <input type="text" class="form-control" id="suffix" name="suffix" value="{{ $staff->suffix }}">
                            </div>

                            <!-- Sex -->
                            <div class="form-group">
                                <label for="sex">Sex</label>
                                <select class="form-control" id="sex" name="sex">
                                    <option value="" disabled selected>Select Sex</option>
                                    <option value="male" {{ $staff->sex == 'male' ? 'selected' : '' }}>Male</option>
                                    <option value="female" {{ $staff->sex == 'female' ? 'selected' : '' }}>Female</option>
                                    <!-- Add more options if needed -->
                                </select>
                            </div>

                            <!-- Civil Status -->
                            <div class="form-group">
                                <label for="civil_status">Civil Status</label>
                                <select class="form-control" id="civil_status" name="civil_status">
                                    <option value="" disabled selected>Select Civil Status</option>
                                    <option value="single" {{ $staff->civil_status == 'single' ? 'selected' : '' }}>Single</option>
                                    <option value="married" {{ $staff->civil_status == 'married' ? 'selected' : '' }}>Married</option>
                                    <option value="widow" {{ $staff->civil_status == 'widow' ? 'selected' : '' }}>Widow</option>
                                    <!-- Add more options if needed -->
                                </select>
                            </div>

                            <!-- Date of Birth -->
                            <div class="form-group">
                                <label for="dob">Date of Birth</label>
                                <input type="date" class="form-control" id="dob" name="dob" value="{{ $staff->dob }}">
                            </div>

                            <!-- Age -->
                            <div class="form-group">
                                <label for="age">Age</label>
                                <input type="number" class="form-control" id="age" name="age" value="{{ $staff->age }}">
                            </div>

                            <!-- Telephone Number -->
                            <div class="form-group">
                                <label for="tel_no">Telephone Number</label>
                                <input type="tel" class="form-control" id="tel_no" name="tel_no" value="{{ $staff->tel_no }}">
                            </div>

                            <!-- Mobile Number -->
                            <div class="form-group">
                                <label for="mobile_no">Mobile Number</label>
                                <input type="tel" class="form-control" id="mobile_no" name="mobile_no" value="{{ $staff->mobile_no }}">
                            </div>

                            <!-- Email -->
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ $staff->email }}">
                            </div>

                            <!-- Present Address -->
                            <div class="form-group">
                                <label for="present_address">Present Address</label>
                                <textarea class="form-control" id="present_address" name="present_address">{{ $staff->present_address }}</textarea>
                            </div>

                            <!-- Position -->
                            <div class="form-group">
                                <label for="position">Position</label>
                                <select class="form-control" id="position" name="position">
                                    <option value="" disabled>Select Role</option>
                                    <option value="System Administrator" {{ $staff->position == 'System Administrator' ? 'selected' : '' }}>System Administrator</option>
                                    <option value="Chairperson" {{ $staff->position == 'Chairperson' ? 'selected' : '' }}>Chairperson</option>
                                    <option value="Vice-Chairperson" {{ $staff->position == 'Vice-Chairperson' ? 'selected' : '' }}>Vice-Chairperson</option>
                                    <option value="Board Director" {{ $staff->position == 'Board Director' ? 'selected' : '' }}>Board Director</option>
                                    <option value="Board Secretary" {{ $staff->position == 'Board Secretary' ? 'selected' : '' }}>Board Secretary</option>
                                    <option value="Board Treasurer" {{ $staff->position == 'Board Treasurer' ? 'selected' : '' }}>Board Treasurer</option>
                                    <option value="Ex-Officio Member" {{ $staff->position == 'Ex-Officio Member' ? 'selected' : '' }}>Ex-Officio Member</option>
                                    <option value="Chief Executive Officer" {{ $staff->position == 'Chief Executive Officer' ? 'selected' : '' }}>Chief Executive Officer</option>
                                    <option value="Audit Committee" {{ $staff->position == 'Audit Committee' ? 'selected' : '' }}>Audit Committee</option>
                                    <option value="Election Committee" {{ $staff->position == 'Election Committee' ? 'selected' : '' }}>Election Committee</option>
                                    <option value="Gender and Development Committee" {{ $staff->position == 'Gender and Development Committee' ? 'selected' : '' }}>Gender and Development Committee</option>
                                    <option value="Conciliation and Mediation Committee" {{ $staff->position == 'Conciliation and Mediation Committee' ? 'selected' : '' }}>Conciliation and Mediation Committee</option>
                                    <option value="Ethics Committee" {{ $staff->position == 'Ethics Committee' ? 'selected' : '' }}>Ethics Committee</option>
                                    <option value="Staff Member" {{ $staff->position == 'Staff Member' ? 'selected' : '' }}>Staff Member</option>
                                </select>
                            </div><br>

                            <div class="form-group">
                                <div class="d-flex justify-content-between">
                                    <a href="{{ route('staff.index') }}" class="btn btn-danger"><i class="fas fa-times-circle mr-1"></i>{{ __('Cancel') }}</a>
                                    <div>
                                        <button type="reset" class="btn btn-warning"><i class="fas fa-sync-alt mr-1"></i>{{ __('Reset') }}</button>
                                        <button type="submit" class="btn btn-success"><i class="fas fa-check-circle mr-1"></i>{{ __('Update') }}</button>
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