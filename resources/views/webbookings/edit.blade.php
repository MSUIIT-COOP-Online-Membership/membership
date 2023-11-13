@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit Web Booking') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('webbookings.update', $webBooking->id) }}">
                            @csrf
                            @method('PUT')

                            <!-- Member Name -->
                            <div class="form-group row">
                                <label for="member_name" class="col-md-4 col-form-label text-md-right">{{ __('Member') }}</label>

                                <div class="col-md-6">
                                    <input id="member_name" type="text" class="form-control" value="{{ $webBooking->member->lname }}, {{ $webBooking->member->fname }} {{ $webBooking->member->mname }}" disabled>
                                </div>
                            </div>

                            <!-- Webinar Tool -->
                            <div class="form-group row">
                                <label for="web_tool" class="col-md-4 col-form-label text-md-right">{{ __('Webinar Tool') }}</label>

                                <div class="col-md-6">
                                    <input id="web_tool" type="text" class="form-control" value="{{ $webBooking->webinar ? $webBooking->webinar->web_tool : 'No Webinar' }}" disabled>
                                </div>
                            </div>

                            <!-- Status -->
                            <div class="form-group row">
                                <label for="status" class="col-md-4 col-form-label text-md-right">{{ __('Status') }}</label>

                                <div class="col-md-6">
                                    <select id="status" class="form-control @error('status') is-invalid @enderror" name="status" required>
                                        <option value="Pending" {{ $webBooking->status === 'Pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="Attended" {{ $webBooking->status === 'Attended' ? 'selected' : '' }}>Attended</option>
                                    </select>

                                    @error('status')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Update Web Booking') }}
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
