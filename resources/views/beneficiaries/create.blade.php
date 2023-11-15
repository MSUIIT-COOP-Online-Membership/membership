<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beneficiary / Create</title>
</head>
<body>
@extends('layouts.app')

    @section('content')

    <!-- Content Header (Page header) -->
<section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create Beneficiary</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('beneficiaries.index') }}">Beneficiaries</a></li>
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
                            <h7 class="mb-0">{{ __('Please input fields to add beneficiary.') }}</h7>
                        </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('beneficiaries.store') }}">
                            @csrf

                                <!-- Beneficiary 1 -->
                                <div class="form-group">
                                    <label for="ben_fname">{{ __('First Name') }}</label>
                                    <input id="ben_fname" type="text" class="form-control" name="ben_fname" required>
                                </div>
                                <div class="form-group">
                                    <label for="ben_mname">{{ __('Middle Name') }}</label>
                                    <input id="ben_mname" type="text" class="form-control" name="ben_mname">
                                </div>
                                <div class="form-group">
                                    <label for="ben_lname">{{ __('Last Name') }}</label>
                                    <input id="ben_lname" type="text" class="form-control" name="ben_lname" required>
                                </div>
                                <div class="form-group">
                                    <label for="ben_suffix">{{ __('Suffix') }}</label>
                                    <input id="ben_suffix" type="text" class="form-control" name="ben_suffix">
                                </div>
                                <div class="form-group">
                                    <label for="ben_dob">{{ __('Date of Birth') }}</label>
                                    <input id="ben_dob" type="date" class="form-control" name="ben_dob" required>
                                </div>
                                <div class="form-group">
                                    <label for="ben_relationship">{{ __('Relationship') }}</label>
                                    <input id="ben_relationship" type="text" class="form-control" name="ben_relationship" required>
                                </div>

                            <div class="form-group">
                                <label for="member_id">{{ __('Attached Member') }}</label>
                                    <select id="member_id" class="form-control @error('member_id') is-invalid @enderror" name="member_id" required>
                                        <option value="" disabled selected>Select Attached Member</option>
                                        @foreach($members as $member)
                                            <option value="{{ $member->id }}">{{ $member->lname }}, {{ $member->fname }} {{ $member->mname }}</option>
                                        @endforeach
                                    </select>
                                    @error('member_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                            </div><br>


                                <div class="form-group">
                                    <div class="d-flex justify-content-between">
                                        <a href="{{ route('evaluations.index') }}" class="btn btn-danger"><i class="fas fa-times-circle mr-1"></i>{{ __('Cancel') }}</a>
                                        <div>
                                            <button type="reset" class="btn btn-warning"><i class="fas fa-sync-alt mr-1"></i>{{ __('Reset') }}</button>
                                            <button type="submit" class="btn btn-success"><i class="fas fa-check-circle mr-1"></i>{{ __('Create') }}</button>
                                        </div>
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
