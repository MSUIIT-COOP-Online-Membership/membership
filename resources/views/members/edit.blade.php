
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Members / Update</title>
</head>
<body>
    
@extends('layouts.app')

@section('content')
<section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Update Member</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('members.index') }}">Members</a></li>
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

                    <div class="card-body">
                    <form id="memberFormId" method="POST" action="{{ route('members.update', $member->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                            <!-- Section 1: Personal Info -->
                        <div id="section1">
                            <div class="card-header bg-dark text-white">
                                <h7 class="mb-0">{{ __('Personal Information') }}</h7>
                            </div><br>

                            @if ($member->id_photo)
                                <img src="{{ asset('images/id_photos/' . $member->id_photo) }}" alt="ID Photo" class="img-fluid rounded-circle mx-auto d-block" style="max-width: 150px; max-height: 150px;">
                            @else
                                <div class="bg-light d-flex justify-content-center align-items-center rounded-circle mx-auto" style="width: 150px; height: 150px;">
                                    <span class="text-muted">No ID Photo</span>
                                </div>
                            @endif

                            <div class="text-center mt-3">
                                <label for="id_photo" class="btn btn-primary">
                                <i class="fas fa-upload"></i> New ID Photo
                                    <input type="file" id="id_photo" name="id_photo" class="form-control-file" style="display: none;" onchange="displayFileName()">
                                </label>
                                <p id="selectedFileName" class="mt-2"></p>
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


                            <div class="form-group">
                                <label for="lname">{{ __('Last Name') }}</label>
                                <input id="lname" type="text" class="form-control" name="lname" value="{{ old('lname', $member->lname) }}">
                            </div>

                            <div class="form-group">
                                <label for="mname">{{ __('Middle Name') }}</label>
                                <input id="mname" type="text" class="form-control" name="mname" value="{{ old('mname', $member->mname) }}">
                            </div>

                            <div class="form-group">
                                <label for="fname">{{ __('First Name') }}</label>
                                <input id="fname" type="text" class="form-control" name="fname" value="{{ old('fname', $member->fname) }}">
                            </div>

                            <div class="form-group">
                                <label for="suffix">{{ __('Suffix') }}</label>
                                <input id="suffix" type="text" class="form-control" name="suffix" value="{{ old('suffix', $member->suffix) }}">
                            </div>

                            <div class="form-group">
                                <label for="sex">{{ __('Sex') }}</label>
                                <select id="sex" class="form-control" name="sex">
                                <option value="" disabled selected>Select Sex</option>
                                    <option value="male">{{ __('Male') }}</option>
                                    <option value="female">{{ __('Female') }}</option>
                                    <option value="{{ old('sex', $member->sex) }}" selected>{{ ucfirst(old('sex', $member->sex)) }}</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="civil_status">{{ __('Civil Status') }}</label>
                                <select id="civil_status" class="form-control" name="civil_status">
                                <option value="" disabled selected>Select Civil Status</option>
                                    <option value="single">{{ __('Single') }}</option>
                                    <option value="married">{{ __('Married') }}</option>
                                    <option value="widow">{{ __('Widow') }}</option>
                                    <option value="{{ old('civil_status', $member->civil_status) }}" selected>{{ ucfirst(old('civil_status', $member->civil_status)) }}</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="dob">{{ __('Date of Birth') }}</label>
                                <input id="dob" type="date" class="form-control" name="dob" value="{{ old('dob', $member->dob) }}">
                            </div>

                            <div class="form-group">
                                <label for="age">{{ __('Age') }}</label>
                                <input id="age" type="number" class="form-control" name="age" value="{{ old('age', $member->age) }}">
                            </div>

                            <div class="form-group">
                                <label for="tel_no">{{ __('Telephone Number') }}</label>
                                <input id="tel_no" type="tel" class="form-control" name="tel_no" value="{{ old('tel_no', $member->tel_no) }}">
                            </div>

                            <div class="form-group">
                                <label for="mobile_no">{{ __('Mobile Number') }}</label>
                                <input id="mobile_no" type="tel" class="form-control" name="mobile_no" value="{{ old('mobile_no', $member->mobile_no) }}">
                            </div>

                            <div class="form-group">
                                <label for="religion">{{ __('Religion') }}</label>
                                <input id="religion" type="text" class="form-control" name="religion" value="{{ old('religion', $member->religion) }}">
                            </div>

                            <div class="form-group">
                                <label for="email">{{ __('Email') }}</label>
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email', $member->email) }}">
                            </div>

                            <div class="form-group">
                                <label for="place_birth">{{ __('Place of Birth') }}</label>
                                <input id="place_birth" type="text" class="form-control" name="place_birth" value="{{ old('place_birth', $member->place_birth) }}">
                            </div>

                            <div class="form-group">
                                <label for="present_address">{{ __('Present Address') }}</label>
                                <input id="present_address" type="text" class="form-control" name="present_address" value="{{ old('present_address', $member->present_address) }}">
                            </div>

                            <div class="form-group">
                                <label for="duration_residency">{{ __('Duration of Residency (years and months)') }}</label>
                                <input id="duration_residency" type="text" class="form-control" name="houses[duration_residency]" value="{{ old('houses.duration_residency', $member->house->duration_residency ?? '') }}">
                            </div>

                                                                    

                             <div class="form-group mt-5 d-flex justify-content-between">
                                <a href="{{ route('members.index') }}" class="btn btn-danger"><i class="fas fa-times-circle mr-1"></i>{{ __('Cancel') }}</a>
                                <button type="reset" class="btn btn-warning"><i class="fas fa-sync-alt mr-1"></i>{{ __('Reset') }}</button>
                                <button type="button" class="btn btn-primary" onclick="showSection('section2')"><i class="fas fa-arrow-circle-right mr-1"></i>Next</button>
                            </div>
                        </div>
 
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
