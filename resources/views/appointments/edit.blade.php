@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit Appointment') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('appointments.update', $appointment->id) }}">
                            @csrf
                            @method('PUT')

                            <!-- Member -->
                            <div class="form-group">
                                <label for="member_id">Member</label>
                                <select id="member_id" class="form-control @error('member_id') is-invalid @enderror" name="member_id">
                                    <option value="" disabled>Select Member</option>
                                    @foreach($members as $member)
                                        <option value="{{ $member->id }}" {{ $appointment->member_id == $member->id ? 'selected' : '' }}>
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

                            <!-- Branch -->
                            <div class="form-group">
                                <label for="branch_id">Branch</label>
                                <select id="branch_id" class="form-control" name="branch_id" required>
                                    @foreach($branches as $branch)
                                        <option value="{{ $branch->id }}" {{ $appointment->branch_id == $branch->id ? 'selected' : '' }}>
                                            {{ $branch->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Subject -->
                            <div class="form-group">
                                <label for="subject">Subject</label>
                                <input type="text" class="form-control" id="subject" name="subject" value="{{ $appointment->subject }}" required>
                            </div>

                            <!-- Date -->
                            <div class="form-group">
                                <label for="date">Date</label>
                                <input type="date" class="form-control" id="date" name="date" value="{{ $appointment->date }}" required>
                            </div>

                            <!-- Start Time -->
                            <div class="form-group">
                                <label for="start_time">Start Time</label>
                                <input type="time" class="form-control" id="start_time" name="start_time" value="{{ $appointment->start_time }}" required>
                            </div>

                            <!-- End Time -->
                            <div class="form-group">
                                <label for="end_time">End Time</label>
                                <input type="time" class="form-control" id="end_time" name="end_time" value="{{ $appointment->end_time }}" required>
                            </div>

                            <!-- Status -->
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select id="status" class="form-control" name="status" required>
                                    <option value="available" {{ $appointment->status == 'available' ? 'selected' : '' }}>Available</option>
                                    <option value="booked" {{ $appointment->status == 'booked' ? 'selected' : '' }}>Booked</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Update Appointment</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
