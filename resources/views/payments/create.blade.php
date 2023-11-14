<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payments / Create</title>
</head>
<body>
@extends('layouts.app')

    @section('content')

    <!-- Content Header (Page header) -->
<section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create Payment</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('payments.index') }}">Payments</a></li>
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
                            <h7 class="mb-0">{{ __('Please input fields to add payment.') }}</h7>
                        </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('payments.store') }}">
                            @csrf

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

                            <!-- Amount -->
                            <div class="form-group">
                                <label for="amount">Amount</label>
                                <input type="number" class="form-control" id="amount" name="amount" required>
                            </div>

                            <!-- Coop Teller -->
                            <div class="form-group">
                                <label for="coop_teller">COOP Teller</label>
                                <select class="form-control" id="coop_teller" name="coop_teller" required>
                                    @foreach($staffMembers as $staff)
                                        <option value="{{ $staff->id }}">{{ $staff->fname }} {{ $staff->lname }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                    <div class="d-flex justify-content-between">
                                        <a href="{{ route('payments.index') }}" class="btn btn-danger"><i class="fas fa-times-circle mr-1"></i>{{ __('Cancel') }}</a>
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
