<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users / Create</title>
</head>
<body>
@extends('layouts.app')

@section('content')
 <!-- Content Header (Page header) -->
 <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create User</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('users.index') }}">Users</a></li>
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
                            <h7 class="mb-0">{{ __('Please input fields to add user.') }}</h7>
                        </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="text-center mt-3">
                                <label for="id_photo" class="btn btn-primary">
                                    <i class="fas fa-upload"></i> Browse ID Photo
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

                            <div class="form-group">
                                <label for="name">{{ __('Name') }}</label>
                                <input type="text" id="name" name="name" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="email">{{ __('Email') }}</label>
                                <input type="email" id="email" name="email" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="password">{{ __('Password') }}</label>
                                <input type="password" id="password" name="password" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="password_confirmation">{{ __('Confirm Password') }}</label>
                                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
                            </div>


                            <div class="form-group">
                                <label for="role">{{ __('Role') }}</label>
                                <select id="role" name="role" class="form-control" required>
                                    <option value="" disabled selected>Select Role</option>
                                    <option value="System Administrator">System Administrator</option>
                                    <option value="Regular Member">Regular Member</option>
                                    <option value="Associate Member">Associate Member</option>
                                </select>
                            </div><br>

                            <div class="form-group">
                                <div class="d-flex justify-content-between">
                                    <a href="{{ route('users.index') }}" class="btn btn-danger"><i class="fas fa-times-circle mr-1"></i>{{ __('Cancel') }}</a>
                                    <div>
                                        <button type="reset" class="btn btn-warning"><i class="fas fa-sync-alt mr-1"></i>{{ __('Reset') }}</button>
                                        <button type="submit" class="btn btn-success"><i class="fas fa-check-circle mr-1"></i>{{ __('Create') }}</button>
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