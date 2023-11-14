<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evaluations / Create</title>
</head>
<body>
@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create Evaluation</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('evaluations.index') }}">Evaluations</a></li>
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
                            <h7 class="mb-0">{{ __('Please input fields to add evaluation entry.') }}</h7>
                        </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('evaluations.store') }}">
                            @csrf

                            <!-- Add your form fields here -->
                            <div class="form-group">
                                <label for="member_id">{{ __('Member') }}</label>
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

                            <div class="form-group">
                                <label for="branch_id">{{ __('Branch') }}</label>
                                    <select id="branch_id" class="form-control @error('branch_id') is-invalid @enderror" name="branch_id" required>
                                        <option value="" disabled selected>Select Branch</option>
                                        @foreach($branches as $branch)
                                            <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('branch_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                            </div>
                            

                            <!-- Additional form fields for qs -->
                            <!-- @for ($i = 1; $i <= 10; $i++)
                                <div class="form-group">
                                    <label for="q_{{ $i }}">{{ __('Q'.$i.': '.getQuestionText($i)) }}</label>
                                        <select id="q_{{ $i }}" class="form-control @error('q_'.$i) is-invalid @enderror" name="q_{{ $i }}" required>
                                            <option value="" disabled selected>Select Option</option>
                                            @foreach (getQuestionOptions($i) as $option)
                                                <option value="{{ $option }}">{{ $option }}</option>
                                            @endforeach
                                        </select>
                                        @error('q_'.$i)
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                </div>
                            @endfor -->

                            <div class="form-group">
                                <label for="q_one">{{ __('Q1: How well did you understand our online Pre-membership Education Seminar? (Rate 1-5 as 5 being the highest)') }}</label>
                                <select id="q_one" class="form-control @error('q_one') is-invalid @enderror" name="q_one">
                                    <option value="" disabled selected>Select Answer</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                                @error('q_one')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="q_two">{{ __('Q2: Who are the owners of MSU-IIT NMPC (IIT Coop)?') }}</label>
                                <select id="q_two" class="form-control @error('q_two') is-invalid @enderror" name="q_two">
                                    <option value="" disabled selected>Select Answer</option>
                                    <option value="Board of Directors">Board of Directors</option>
                                    <option value="Management and Staff">Management and Staff</option>
                                    <option value="Members">Members</option>
                                </select>
                                @error('q_two')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="q_three">{{ __('Q3: What year did the IIT Coop start?') }}</label>
                                <select id="q_three" class="form-control @error('q_three') is-invalid @enderror" name="q_three">
                                    <option value="" disabled selected>Select Answer</option>
                                    <option value="1978">1978</option>
                                    <option value="1987">1987</option>
                                    <option value="1999">1999</option>
                                </select>
                                @error('q_three')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="q_four">{{ __('Q4: How much is the interest rate of our Savings Deposit?') }}</label>
                                <select id="q_four" class="form-control @error('q_four') is-invalid @enderror" name="q_four">
                                    <option value="" disabled selected>Select Answer</option>
                                    <option value="0.75 % per annum">0.75 % per annum</option>
                                    <option value="1.25 % per annum">1.25 % per annum</option>
                                    <option value="1.50 % per annum">1.50 % per annum</option>
                                    <option value="1.75 % per annum">1.75 % per annum</option>
                                </select>
                                @error('q_four')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="q_five">{{ __('Q5: What type of deposit is non-withdrawable?') }}</label>
                                <select id="q_five" class="form-control @error('q_five') is-invalid @enderror" name="q_five">
                                    <option value="" disabled selected>Select Answer</option>
                                    <option value="Coop Care">Coop Care</option>
                                    <option value="Share Capital">Share Capital</option>
                                    <option value="Savings Deposit">Savings Deposit</option>
                                </select>
                                @error('q_five')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="q_six">{{ __('Q6: Does IIT Coop offer free training and seminars to the member-owners?') }}</label>
                                <select id="q_six" class="form-control @error('q_six') is-invalid @enderror" name="q_six">
                                    <option value="" disabled selected>Select Answer</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                                @error('q_six')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="q_seven">{{ __('Q7: What is the 2nd Cooperative Principle?') }}</label>
                                <select id="q_seven" class="form-control @error('q_seven') is-invalid @enderror" name="q_seven">
                                    <option value="" disabled selected>Select Answer</option>
                                    <option value="Democratic Member Control">Democratic Member Control</option>
                                    <option value="Voluntary and Open Membership">Voluntary and Open Membership</option>
                                    <option value="Member Economic Participation">Member Economic Participation</option>
                                </select>
                                @error('q_seven')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="q_eight">{{ __('Q8: What type of membership can avail and enjoy the full benefits and privileges as a member-owner?') }}</label>
                                <select id="q_eight" class="form-control @error('q_eight') is-invalid @enderror" name="q_eight">
                                    <option value="" disabled selected>Select Answer</option>
                                    <option value="Regular Membership">Regular Membership</option>
                                    <option value="Associate Membership">Associate Membership</option>
                                </select>
                                @error('q_eight')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="q_nine">{{ __('Q9: What is the health care program of IIT Coop?') }}</label>
                                <select id="q_nine" class="form-control @error('q_nine') is-invalid @enderror" name="q_nine">
                                    <option value="" disabled selected>Select Answer</option>
                                    <option value="Sunshine Damayan">Sunshine Damayan</option>
                                    <option value="Coop Care">Coop Care</option>
                                </select>
                                @error('q_nine')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="q_ten">{{ __('Q10: What is the name of the online platform that MSU-IIT COOP offers?') }}</label>
                                <select id="q_ten" class="form-control @error('q_ten') is-invalid @enderror" name="q_ten">
                                    <option value="" disabled selected>Select Answer</option>
                                    <option value="KAYA Payment Platform">KAYA Payment Platform</option>
                                    <option value="GCash">GCash</option>
                                </select>
                                @error('q_ten')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <!-- Additional form fields for score and pass_status -->
                            <div class="form-group">
                                <label for="score">{{ __('Score') }}</label>
                                <input type="number" id="score" class="form-control @error('score') is-invalid @enderror" name="score">
                                @error('score')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="pass_status">{{ __('Pass Status') }}</label>
                                <select id="pass_status" class="form-control @error('pass_status') is-invalid @enderror" name="pass_status">
                                    <option value="" disabled selected>Select Pass Status</option>
                                    <option value="Passed">Passed</option>
                                    <option value="Failed">Failed</option>
                                </select>
                                @error('pass_status')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <!-- Other form fields... -->

                            <div class="form-group">
                                <div class="d-flex justify-content-between">
                                    <a href="{{ route('evaluations.index') }}" class="btn btn-danger"><i class="fas fa-times-circle mr-1"></i>{{ __('Cancel') }}</a>
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

<!-- @php
function getQuestionText($number) {
    switch ($number) {
        case 1:
            return 'How well did you understand our online Pre-membership Education Seminar? (Rate 1-5 as 5 being the highest)';
        case 2:
            return 'Who are the owners of MSU-IIT NMPC (IIT Coop)?';
        case 3:
            return 'What year did the IIT Coop start?';
        case 4:
            return 'How much is the interest rate of our Savings Deposit?';
        case 5:
            return 'What type of deposit is non-withdrawable?';
        case 6:
            return 'Does IIT Coop offer free training and seminars to the member-owners?';
        case 7:
            return 'What is the 2nd Cooperative Principle?';
        case 8:
            return 'What type of membership can avail and enjoy the full benefits and privileges as a member-owner?';
        case 9:
            return 'What is the health care program of IIT Coop?';
        case 10:
            return 'What is the name of the online platform that MSU-IIT COOP offers?';
        default:
            return '';
    }
}

function getQuestionOptions($number) {
    switch ($number) {
        case 1:
            return range(1, 5);
        case 2:
            return ['Board of Directors', 'Board of Directors', 'Members'];
        case 3:
            return ['1978', '1987', '1999'];
        case 4:
            return ['0.75 % per annum', '1.25 % per annum', '1.50 % per annum', '1.75 % per annum'];
        case 5:
            return ['Coop Care', 'Share Capital', 'Savings Deposit'];
        case 6:
            return ['Yes', 'No'];
        case 7:
            return ['Democratic Member Control', 'Voluntary and Open Membership', 'Member Economic Participation'];
        case 8:
            return ['Regular Membership', 'Associate Membership'];
        case 9:
            return ['Sunshine Damayan', 'Coop Care'];
        case 10:
            return ['KAYA Payment Platform', 'GCash'];
        default:
            return [];
    }
}
@endphp -->

</body>
</html>