<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evaluations / Update</title>
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
                        <li class="breadcrumb-item active"><a href="{{ route('evaluations.index') }}">Evaluations</a></li>
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
                            <h7 class="mb-0">{{ __('Please input fields to update evaluation entry.') }}</h7>
                        </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('evaluations.update', $evaluation->id) }}">
                            @csrf
                            @method('PUT')

                            <!-- Member ID -->
                            <div class="form-group">
                                <label for="member_id">{{ __('Member') }}</label>     
                                    <!-- Display the member name or ID based on your requirement -->
                                    <input id="member_id" type="text" class="form-control" value="{{ $evaluation->member->fname }} {{ $evaluation->member->mname }} {{ $evaluation->member->lname }} {{ $evaluation->member->suffix }}" readonly>
                            </div>

                            <!-- Branch ID -->
                            <div class="form-group">
                                <label for="branch_id">{{ __('Branch') }}</label>
                                    <!-- Display the branch name or ID based on your requirement -->
                                    <input id="branch_id" type="text" class="form-control" value="{{ $evaluation->branch->name }}" readonly>
                            </div>

                            <div class="form-group">
                                <label for="q_one">{{ __('Q1: How well did you understand our online Pre-membership Education Seminar? (Rate 1-5 as 5 being the highest)') }}</label>
                                <select id="q_one" class="form-control @error('q_one') is-invalid @enderror" name="q_one">
                                    <option value="" disabled selected>Select Answer</option>
                                    <option value="1" {{ $evaluation->q_one === '1' ? 'selected' : '' }}>1</option>
                                    <option value="2" {{ $evaluation->q_one === '2' ? 'selected' : '' }}>2</option>
                                    <option value="3" {{ $evaluation->q_one === '3' ? 'selected' : '' }}>3</option>
                                    <option value="4" {{ $evaluation->q_one === '4' ? 'selected' : '' }}>4</option>
                                    <option value="5" {{ $evaluation->q_one === '5' ? 'selected' : '' }}>5</option>
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
                                        <option value="" disabled>Select Answer</option>
                                        <option value="Board of Directors" {{ old('q_two', $evaluation->q_two) == 'Board of Directors' ? 'selected' : '' }}>Board of Directors</option>
                                        <option value="Management and Staff" {{ old('q_two', $evaluation->q_two) == 'Management and Staff' ? 'selected' : '' }}>Management and Staff</option>
                                        <option value="Members" {{ old('q_two', $evaluation->q_two) == 'Members' ? 'selected' : '' }}>Members</option>
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
                                        <option value="" disabled>Select Answer</option>
                                        <option value="1978" {{ old('q_three', $evaluation->q_three) == '1978' ? 'selected' : '' }}>1978</option>
                                        <option value="1987" {{ old('q_three', $evaluation->q_three) == '1987' ? 'selected' : '' }}>1987</option>
                                        <option value="1999" {{ old('q_three', $evaluation->q_three) == '1999' ? 'selected' : '' }}>1999</option>
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
                                        <option value="" disabled>Select Answer</option>
                                        <option value="0.75 % per annum" {{ old('q_four', $evaluation->q_four) == '0.75 % per annum' ? 'selected' : '' }}>0.75 % per annum</option>
                                        <option value="1.25 % per annum" {{ old('q_four', $evaluation->q_four) == '1.25 % per annum' ? 'selected' : '' }}>1.25 % per annum</option>
                                        <option value="1.50 % per annum" {{ old('q_four', $evaluation->q_four) == '1.50 % per annum' ? 'selected' : '' }}>1.50 % per annum</option>
                                        <option value="1.75 % per annum" {{ old('q_four', $evaluation->q_four) == '1.75 % per annum' ? 'selected' : '' }}>1.75 % per annum</option>
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
                                        <option value="" disabled>Select Answer</option>
                                        <option value="Coop Care" {{ old('q_five', $evaluation->q_five) == 'Coop Care' ? 'selected' : '' }}>Coop Care</option>
                                        <option value="Share Capital" {{ old('q_five', $evaluation->q_five) == 'Share Capital' ? 'selected' : '' }}>Share Capital</option>
                                        <option value="Savings Deposit" {{ old('q_five', $evaluation->q_five) == 'Savings Deposit' ? 'selected' : '' }}>Savings Deposit</option>
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
                                        <option value="" disabled>Select Answer</option>
                                        <option value="Yes" {{ old('q_six', $evaluation->q_six) == 'Yes' ? 'selected' : '' }}>Yes</option>
                                        <option value="No" {{ old('q_six', $evaluation->q_six) == 'No' ? 'selected' : '' }}>No</option>
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
                                        <option value="" disabled>Select Answer</option>
                                        <option value="Democratic Member Control" {{ old('q_seven', $evaluation->q_seven) == 'Democratic Member Control' ? 'selected' : '' }}>Democratic Member Control</option>
                                        <option value="Voluntary and Open Membership" {{ old('q_seven', $evaluation->q_seven) == 'Voluntary and Open Membership' ? 'selected' : '' }}>Voluntary and Open Membership</option>
                                        <option value="Member Economic Participation" {{ old('q_seven', $evaluation->q_seven) == 'Member Economic Participation' ? 'selected' : '' }}>Member Economic Participation</option>
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
                                        <option value="" disabled>Select Answer</option>
                                        <option value="Regular Membership" {{ old('q_eight', $evaluation->q_eight) == 'Regular Membership' ? 'selected' : '' }}>Regular Membership</option>
                                        <option value="Associate Membership" {{ old('q_eight', $evaluation->q_eight) == 'Associate Membership' ? 'selected' : '' }}>Associate Membership</option>
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
                                        <option value="" disabled>Select Answer</option>
                                        <option value="Sunshine Damayan" {{ old('q_nine', $evaluation->q_nine) == 'Sunshine Damayan' ? 'selected' : '' }}>Sunshine Damayan</option>
                                        <option value="Coop Care" {{ old('q_nine', $evaluation->q_nine) == 'Coop Care' ? 'selected' : '' }}>Coop Care</option>
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
                                        <option value="" disabled>Select Answer</option>
                                        <option value="KAYA Payment Platform" {{ old('q_ten', $evaluation->q_ten) == 'KAYA Payment Platform' ? 'selected' : '' }}>KAYA Payment Platform</option>
                                        <option value="GCash" {{ old('q_ten', $evaluation->q_ten) == 'GCash' ? 'selected' : '' }}>GCash</option>
                                    </select>
                                    @error('q_ten')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label for="score">{{ __('Score') }}</label>
                                    <input type="number" id="score" class="form-control @error('score') is-invalid @enderror" name="score" value="{{ old('score', $evaluation->score) }}">
                                    @error('score')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="pass_status">{{ __('Pass Status') }}</label>
                                    <select id="pass_status" class="form-control @error('pass_status') is-invalid @enderror" name="pass_status">
                                        <option value="" disabled>Select Pass Status</option>
                                        <option value="Passed" {{ old('pass_status', $evaluation->pass_status) == 'Passed' ? 'selected' : '' }}>Passed</option>
                                        <option value="Failed" {{ old('pass_status', $evaluation->pass_status) == 'Failed' ? 'selected' : '' }}>Failed</option>
                                    </select>
                                    @error('pass_status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            <!-- Submit Button -->
                            <div class="form-group">
                                <div class="d-flex justify-content-between">
                                    <a href="{{ route('evaluations.index') }}" class="btn btn-danger"><i class="fas fa-times-circle mr-1"></i>{{ __('Cancel') }}</a>
                                    <div>
                                        <button type="reset" class="btn btn-warning"><i class="fas fa-sync-alt mr-1"></i>{{ __('Reset') }}</button>
                                        <button type="submit" class="btn btn-primary"><i class="fas fa-check-circle mr-1"></i>{{ __('Update Entry') }}</button>
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