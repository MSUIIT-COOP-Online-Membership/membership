@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit Evaluation') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('evaluations.update', $evaluation->id) }}">
                            @csrf
                            @method('PUT')

                            <!-- Add your form fields here with pre-filled values from $evaluation -->
                            <!-- Member ID -->
                            <div class="form-group row">
                                <label for="member_id" class="col-md-4 col-form-label text-md-right">{{ __('Member') }}</label>
                                <div class="col-md-6">
                                    <!-- Display the member name or ID based on your requirement -->
                                    <input id="member_id" type="text" class="form-control" value="{{ $evaluation->member->name }}" readonly>
                                </div>
                            </div>

                            <!-- Branch ID -->
                            <div class="form-group row">
                                <label for="branch_id" class="col-md-4 col-form-label text-md-right">{{ __('Branch') }}</label>
                                <div class="col-md-6">
                                    <!-- Display the branch name or ID based on your requirement -->
                                    <input id="branch_id" type="text" class="form-control" value="{{ $evaluation->branch->name }}" readonly>
                                </div>
                            </div>

                            <!-- Other fields... -->
                            
                            <div class="form-group row">
                                <label for="q_one" class="col-md-4 col-form-label text-md-right">{{ __('Question One') }}</label>
                                <div class="col-md-6">
                                    <input id="q_one" type="number" class="form-control @error('q_one') is-invalid @enderror" name="q_one" value="{{ old('q_one', $evaluation->q_one) }}" required>
                                    @error('q_one')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Add other fields similarly -->

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Update Evaluation') }}
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
