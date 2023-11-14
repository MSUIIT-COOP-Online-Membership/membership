<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Applications / Create</title>
</head>
<body>
@extends('layouts.app')

    @section('content')

    <!-- Content Header (Page header) -->
<section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create Application</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('applications.index') }}">Applications</a></li>
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
                            <h7 class="mb-0">{{ __('Please input fields to add application.') }}</h7>
                        </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('applications.store') }}">
                            @csrf

                            <!-- Type -->
                            <div class="form-group">
                                <label for="type">Type</label>
                                <select class="form-control" id="type" name="type" required>
                                    <option value="Regular Member">Regular Member</option>
                                    <option value="Associate Member">Associate Member</option>
                                </select>
                            </div>


                            <!-- Status -->
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="form-control" id="status" name="status" required>
                                    <option value="New Member">New Member</option>
                                    <option value="For Updating">For Updating</option>
                                </select>
                            </div>


                            <!-- Member -->
                            <div class="form-group">
                                <label for="member_id">Member</label>
                                <select id="member_id" class="form-control @error('member_id') is-invalid @enderror" name="member_id" required>
                                    <option value="" disabled selected>Select Member</option>
                                    @foreach($members as $member)
                                        <option value="{{ $member->id }}">{{ $member->lname }}, {{ $member->fname }} {{ $member->mname }}</option>
                                    @endforeach
                                </select>
                                @error('member_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <!-- Branch -->
                            <div class="form-group">
                                <label for="branch_id">Branch</label>
                                <select class="form-control" id="branch_id" name="branch_id" required>
                                    @foreach($branches as $branch)
                                        <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Approved By -->
                            <div class="form-group">
                                <label for="approved_by">Approved By</label>
                                <select class="form-control" id="approved_by" name="approved_by" required>
                                    @foreach($staffMembers as $staff)
                                        <option value="{{ $staff->id }}">{{ $staff->fname }} {{ $staff->lname }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Payment -->
                            <div class="form-group">
                                <label for="payment_id">Payment</label>
                                <select class="form-control" id="payment_id" name="payment_id" required>
                                    @foreach($payments as $payment)
                                        <option value="{{ $payment->id }}">{{ $payment->member->fname }} {{ $payment->member->lname }} - PHP {{ $payment->amount }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                    <div class="d-flex justify-content-between">
                                        <a href="{{ route('applications.index') }}" class="btn btn-danger"><i class="fas fa-times-circle mr-1"></i>{{ __('Cancel') }}</a>
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
    @include('sweetalert::alert')
    @endsection
</body>
</html>