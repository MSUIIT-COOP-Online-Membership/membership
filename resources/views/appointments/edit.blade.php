<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointments / Update</title>
</head>
<body>
    @extends('layouts.app')

@section('content')

  <!-- Content Header (Page header) -->
  <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Update Appointment</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('appointments.index') }}">Appointments</a></li>
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
                            <h7 class="mb-0">{{ __('Please input fields to update appointment.') }}</h7>
                        </div>
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
                                    <option value="" disabled selected>Select Status</option>
                                    <option value="available" {{ $appointment->status == 'Available' ? 'selected' : '' }}>Available</option>
                                    <option value="booked" {{ $appointment->status == 'Booked' ? 'selected' : '' }}>Booked</option>
                                </select>
                            </div>

                            <!-- Submit Button -->
                            <div class="form-group">
                                <div class="d-flex justify-content-between">
                                    <a href="{{ route('appointments.index') }}" class="btn btn-danger"><i class="fas fa-times-circle mr-1"></i>{{ __('Cancel') }}</a>
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