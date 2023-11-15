<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beneficiaries / Update</title>
</head>
<body>
    @extends('layouts.app')

@section('content')

  <!-- Content Header (Page header) -->
  <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Update Branch</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('beneficiaries.index') }}">Beneficiaries</a></li>
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
                            <h7 class="mb-0">{{ __('Please input fields to update beneficiary entry.') }}</h7>
                        </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('beneficiaries.update', $beneficiary->id) }}">
                            @csrf
                            @method('PUT')

                            <!-- First Name -->
                            <div class="form-group">
                                <label for="ben_fname">First Name</label>
                                <input type="text" class="form-control" id="ben_fname" name="ben_fname" value="{{ $beneficiary->ben_fname }}">
                            </div>

                            <!-- Last Name -->
                            <div class="form-group">
                                <label for="ben_lname">Last Name</label>
                                <input type="text" class="form-control" id="ben_lname" name="ben_lname" value="{{ $beneficiary->ben_lname }}">
                            </div>

                            <!-- Middle Name -->
                            <div class="form-group">
                                <label for="ben_mname">Middle Name</label>
                                <input type="text" class="form-control" id="ben_mname" name="ben_mname" value="{{ $beneficiary->ben_mname }}">
                            </div>

                            <!-- First Name -->
                            <div class="form-group">
                                <label for="ben_fname">First Name</label>
                                <input type="text" class="form-control" id="ben_fname" name="ben_fname" value="{{ $beneficiary->ben_fname }}">
                            </div>

                            <!-- Suffix -->
                            <div class="form-group">
                                <label for="ben_suffix">Suffix</label>
                                <input type="text" class="form-control" id="ben_suffix" name="ben_suffix" value="{{ $beneficiary->ben_suffix }}">
                            </div>

                            <!-- Date of Birth -->
                            <div class="form-group">
                                <label for="ben_dob">Date of Birth</label>
                                <input type="date" class="form-control" id="ben_dob" name="ben_dob" value="{{ $beneficiary->ben_dob }}">
                            </div>

                            <!-- Relationship -->
                            <div class="form-group">
                                <label for="ben_relationship">Suffix</label>
                                <input type="text" class="form-control" id="ben_relationship" name="ben_relationship" value="{{ $beneficiary->ben_relationship }}">
                            </div>
                    
                            <!-- Member -->
                            <div class="form-group">
                                <label for="member_id">Member</label>
                                <select id="member_id" class="form-control @error('member_id') is-invalid @enderror" name="member_id">
                                    <option value="" disabled>Select Member</option>
                                    @foreach($members as $member)
                                        <option value="{{ $member->id }}" {{ $beneficiary->member_id == $member->id ? 'selected' : '' }}>
                                            {{ $member->lname }}, {{ $member->fname }} {{ $member->mname }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('member_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Submit Button -->
                            <div class="form-group">
                                <div class="d-flex justify-content-between">
                                    <a href="{{ route('beneficiaries.index') }}" class="btn btn-danger"><i class="fas fa-times-circle mr-1"></i>{{ __('Cancel') }}</a>
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