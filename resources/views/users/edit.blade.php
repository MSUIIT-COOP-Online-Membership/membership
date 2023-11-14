<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users / Update</title>
</head>
<body>

@extends('layouts.app')

@section('content')
<section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Update User</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('users.index') }}">Users</a></li>
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
                            <h7 class="mb-0">{{ __('Please input fields to update user.') }}</h7>
                        </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <!-- Display current photo if available -->
                            @if ($user->id_photo)
                                <img src="{{ asset('images/id_photos/' . $user->id_photo) }}" alt="ID Photo" class="img-fluid rounded-circle mx-auto d-block" style="max-width: 150px; max-height: 150px;">
                            @else
                                <div class="bg-light d-flex justify-content-center align-items-center rounded-circle mx-auto" style="width: 150px; height: 150px;">
                                    <span class="text-muted">No ID Photo</span>
                                </div>
                            @endif

                            <div class="text-center mt-3">
                                <label for="id_photo" class="btn btn-light">
                                    Upload New Photo
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
                                        fileNameDisplay.textContent = 'New Selected File: ' + fileInput.files[0].name;
                                    } else {
                                        // If no file is selected, clear the text content
                                        fileNameDisplay.textContent = '';
                                    }
                                }
                            </script>

                            <hr class="solid" style="border-top: 3px solid #bbb"><br>

                            <div class="form-group">
                                <label for="name">{{ __('Name') }}</label>
                                <input type="text" id="name" name="name" class="form-control" value="{{ $user->name }}" required>
                            </div>

                            <div class="form-group">
                                <label for="email">{{ __('Email') }}</label>
                                <input type="email" id="email" name="email" class="form-control" value="{{ $user->email }}" required>
                            </div>

                            <div class="form-group">
                                <label for="role">{{ __('Role') }}</label>
                                <select id="role" name="role" class="form-control" required>
                                    <option value="" disabled selected>Select Role</option>
                                    <option value="System Administrator" {{ $user->role == 'System Administrator' ? 'selected' : '' }}>System Administrator</option>
                                    <option value="Chairperson" {{ $user->role == 'Chairperson' ? 'selected' : '' }}>Chairperson</option>
                                    <option value="Vice-Chairperson" {{ $user->role == 'Vice-Chairperson' ? 'selected' : '' }}>Vice-Chairperson</option>
                                    <option value="Board Secretary" {{ $user->role == 'Board Secretary' ? 'selected' : '' }}>Board Secretary</option>
                                    <option value="Board Treasurer" {{ $user->role == 'Board Treasurer' ? 'selected' : '' }}>Board Treasurer</option>
                                    <option value="Ex-Officio Member" {{ $user->role == 'Ex-Officio Member' ? 'selected' : '' }}>Ex-Officio Member</option>
                                    <option value="Chief Executive Officer" {{ $user->role == 'Chief Executive Officer' ? 'selected' : '' }}>Chief Executive Officer</option>
                                    <option value="Audit Committee" {{ $user->role == 'Audit Committee' ? 'selected' : '' }}>Audit Committee</option>
                                    <option value="Election Committee" {{ $user->role == 'Election Committee' ? 'selected' : '' }}>Election Committee</option>
                                    <option value="Gender and Development Committee" {{ $user->role == 'Gender and Development Committee' ? 'selected' : '' }}>Gender and Development Committee</option>
                                    <option value="Conciliation and Mediation Committee" {{ $user->role == 'Conciliation and Mediation Committee' ? 'selected' : '' }}>Conciliation and Mediation Committee</option>
                                    <option value="Ethics Committee" {{ $user->role == 'Ethics Committee' ? 'selected' : '' }}>Ethics Committee</option>
                                    <option value="Staff Member" {{ $user->role == 'Staff Member' ? 'selected' : '' }}>Staff Member</option>
                                    <option value="COOP Member" {{ $user->role == 'COOP Member' ? 'selected' : '' }}>COOP Member</option>
                                </select>
                            </div>


                            <!-- Other form fields -->

                            <div class="form-group">
                                <label for="old_password">{{ __('Old Password') }}</label>  
                                <input type="password" id="old_password" name="old_password" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="password">{{ __('New Password') }}</label>
                                <input type="password" id="password" name="password" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="password_confirmation">{{ __('Confirm New Password') }}</label>
                                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
                            </div>

                            <div class="form-group">
                                <div class="d-flex justify-content-between">
                                    <a href="{{ route('users.index') }}" class="btn btn-danger"><i class="fas fa-times-circle mr-1"></i>{{ __('Cancel') }}</a>
                                    <div>
                                        <button type="reset" class="btn btn-warning"><i class="fas fa-sync-alt mr-1"></i>{{ __('Reset') }}</button>
                                        <button type="submit" class="btn btn-primary"><i class="fas fa-check-circle mr-1"></i>{{ __('Update User') }}</button>
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