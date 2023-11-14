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
                                <label for="id_photo">{{ __('ID Photo') }}</label>
                                <input type="file" id="id_photo" name="id_photo" class="form-control-file" accept="image/*">
                                <small class="form-text text-muted">Upload a formal ID photo.</small>
                            </div>

                            <div class="form-group">
                                <label for="role">{{ __('Role') }}</label>
                                <select id="role" name="role" class="form-control" required>
                                    <option value="" disabled selected>Select Role</option>
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
                                    <option value="COOP Member">COOP Member</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <div class="d-flex justify-content-between">
                                    <a href="{{ route('users.index') }}" class="btn btn-danger"><i class="fas fa-times-circle mr-1"></i>{{ __('Cancel') }}</a>
                                    <div>
                                        <button type="reset" class="btn btn-warning"><i class="fas fa-sync-alt mr-1"></i>{{ __('Reset') }}</button>
                                        <button type="submit" class="btn btn-primary"><i class="fas fa-check-circle mr-1"></i>{{ __('Create User') }}</button>
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