<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Branches / Create</title>
</head>
<body>
@extends('layouts.app')

    @section('content')

    <!-- Content Header (Page header) -->
<section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create Branch</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('branches.index') }}">Branches</a></li>
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
                            <h7 class="mb-0">{{ __('Please input fields to add branch.') }}</h7>
                        </div>

                        <div class="card-body">
                            <form method="post" action="{{ route('branches.store') }}">
                                @csrf

                                <!-- Branch Name -->
                                <div class="form-group">
                                    <label for="name">Branch Name</label>
                                    <input type="text" class="form-control" id="name" name="name" required>
                                </div>

                                <!-- Manager -->
                                <div class="form-group">
                                    <label for="manager">Manager</label>
                                    <input type="text" class="form-control" id="manager" name="manager">
                                </div>

                                <!-- Address -->
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <textarea class="form-control" id="address" name="address" required></textarea>
                                </div>

                                <!-- Telephone Number -->
                                <div class="form-group">
                                    <label for="tel_no">Telephone Number</label>
                                    <input type="text" class="form-control" id="tel_no" name="tel_no">
                                </div>

                                <!-- Mobile Number -->
                                <div class="form-group">
                                    <label for="mobile_no">Mobile Number</label>
                                    <input type="text" class="form-control" id="mobile_no" name="mobile_no">
                                </div>

                                <!-- Email -->
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email">
                                </div>

                                <div class="form-group">
                                    <div class="d-flex justify-content-between">
                                        <a href="{{ route('branches.index') }}" class="btn btn-danger"><i class="fas fa-times-circle mr-1"></i>{{ __('Cancel') }}</a>
                                        <div>
                                            <button type="reset" class="btn btn-warning"><i class="fas fa-sync-alt mr-1"></i>{{ __('Reset') }}</button>
                                            <button type="submit" class="btn btn-primary"><i class="fas fa-check-circle mr-1"></i>{{ __('Create Branch') }}</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('sweetalert::alert')
    @endsection
</body>
</html>