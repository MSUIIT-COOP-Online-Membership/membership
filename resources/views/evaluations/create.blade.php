@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create Evaluation') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('evaluations.store') }}">
                            @csrf

                            <!-- Add your form fields here -->
                            <div class="form-group row">
                                <label for="member_id" class="col-md-4 col-form-label text-md-right">{{ __('Member') }}</label>
                                <div class="col-md-6">
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
                            </div>

                            <div class="form-group row">
                                <label for="branch_id" class="col-md-4 col-form-label text-md-right">{{ __('Branch') }}</label>
                                <div class="col-md-6">
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
                            </div>

                            <!-- Additional form fields for qs -->
                            @for ($i = 1; $i <= 10; $i++)
                                <div class="form-group row">
                                    <label for="q_{{ $i }}" class="col-md-4 col-form-label text-md-right">{{ __('Q'.$i.': '.getQuestionText($i)) }}</label>
                                    <div class="col-md-6">
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
                                </div>
                            @endfor

                            <!-- Other form fields... -->

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Create Evaluation') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@php
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
            return ['Board of Directors', 'Management and Staff', 'Members'];
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
@endphp
