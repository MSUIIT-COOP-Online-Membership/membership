<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Webinars / Booking / Create</title>
</head>
<body>
@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create Webinar Booking</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('webbookings.index') }}">Webinars</a></li>
                        <li class="breadcrumb-item active">Create Booking</li>
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
                            <h7 class="mb-0">{{ __('Please input fields to add webinar booking.') }}</h7>
                        </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('webbookings.store') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="member_id" class="col-md-4 col-form-label text-md-right">{{ __('Member') }}</label>

                                <div class="col-md-6">
                                    <!-- Assuming you have a variable $members containing the members -->
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
                                <label for="web_id" class="col-md-4 col-form-label text-md-right">{{ __('Webinar Tool') }}</label>

                                <div class="col-md-6">
                                    <!-- Assuming you have a variable $webinars containing the webinars -->
                                    <select id="web_id" class="form-control @error('web_id') is-invalid @enderror" name="web_id" required>
                                        <option value="" disabled selected>Select Webinar</option>
                                        @foreach($webinars as $webinar)
                                            <option value="{{ $webinar->id }}" data-tool="{{ $webinar->web_tool }}">{{ $webinar->web_tool }}</option>
                                        @endforeach
                                    </select>

                                    @error('web_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            

                            <div class="form-group row">
                                <label for="date" class="col-md-4 col-form-label text-md-right">{{ __('Date') }}</label>
                                <div class="col-md-6">
                                    <select id="date" class="form-control" name="date" required></select>
                                    @error('date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="time" class="col-md-4 col-form-label text-md-right">{{ __('Time') }}</label>
                                <div class="col-md-6">
                                    <select id="time" class="form-control" name="time" required></select>
                                    @error('time')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="status" class="col-md-4 col-form-label text-md-right">{{ __('Status') }}</label>

                                <div class="col-md-6">
                                    <select id="status" class="form-control @error('status') is-invalid @enderror" name="status" required>
                                        <option value="" disabled selected>Select Status</option>
                                        <option value="Pending" {{ old('status') === 'Pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="Attended" {{ old('status') === 'Attended' ? 'selected' : '' }}>Attended</option>
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
                                        {{ __('Create Web Booking') }}
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

<!-- Add this script block after your form -->
<script>
    // Function to update date options based on selected web_tool
    function updateDates() {
        var selectedWebinar = $('#web_id option:selected');
        var webTool = selectedWebinar.data('tool');

        // Check if the web_tool is "Google Meet"
        if (webTool === 'Google Meet') {
            var webId = selectedWebinar.val();

            // Make an AJAX request to fetch dates
            $.ajax({
                url: '/webinars/dates/' + webId,
                type: 'GET',
                success: function (data) {
                    // Update the date dropdown with fetched dates
                    var dateDropdown = $('#date');
                    dateDropdown.empty().append('<option value="" disabled selected>Select Date</option>');

                    $.each(data.dates, function (index, date) {
                        dateDropdown.append('<option value="' + date + '">' + date + '</option>');
                    });

                    // Show the date dropdown
                    dateDropdown.show();

                    // Reset and hide the time dropdown
                    $('#time').val('');
                    $('#time').hide();
                },
                error: function (xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        } else {
            // If web_tool is not "Google Meet", reset and hide the date and time dropdowns
            $('#date').val('');
            $('#date').hide();
            $('#time').val('');
            $('#time').hide();
        }
    }

    // Function to update time options based on selected date
    function updateTimes() {
        var selectedDate = $('#date').val();

        // Check if a date is selected
        if (selectedDate) {
            var webId = $('#web_id').val();

            // Make an AJAX request to fetch times
            $.ajax({
                url: '/webinars/times/' + webId + '/' + selectedDate,
                type: 'GET',
                success: function (data) {
                    // Update the time dropdown with fetched times
                    var timeDropdown = $('#time');
                    timeDropdown.empty().append('<option value="" disabled selected>Select Time</option>');

                    $.each(data.times, function (index, time) {
                        timeDropdown.append('<option value="' + time + '">' + time + '</option>');
                    });

                    // Show the time dropdown
                    timeDropdown.show();
                },
                error: function (xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        } else {
            // If no date is selected, reset and hide the time dropdown
            $('#time').val('');
            $('#time').hide();
        }
    }

    // Attach the functions to the change event of the dropdowns
    $('#web_id').on('change', updateDates);
    $('#date').on('change', updateTimes);
</script>
