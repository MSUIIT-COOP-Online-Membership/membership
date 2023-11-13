@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create Web Booking') }}</div>

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
                                <label for="web_id" class="col-md-4 col-form-label text-md-right">{{ __('Webinar') }}</label>

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

                        <!-- Add this div to contain the calendar -->
                        <div id="calendar"></div>

                        <!-- Add a table to display webinar details -->
                        <table id="webinarDetails" class="table" style="display: none;">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Webinar details will be dynamically loaded here -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Include FullCalendar scripts here -->
    <script src="{{ asset('js/fullcalendar/core/main.js') }}"></script>
    <script src="{{ asset('js/fullcalendar/daygrid/main.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> <!-- Include jQuery -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var calendarEl = document.getElementById('calendar');
            var webinarDetailsTable = document.getElementById('webinarDetails');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                events: [
                    // Your events will be dynamically loaded here
                    // Example: { title: 'Webinar 1', start: '2023-11-07T10:00:00' },
                    // ...
                ],
            });

            calendar.render();

            // Update the table with webinar details based on selected webinar tool
            document.getElementById('web_id').addEventListener('change', function () {
                var selectedTool = this.options[this.selectedIndex].getAttribute('data-tool');

                // Fetch webinar details dynamically using AJAX
                $.ajax({
                    url: '/get-webinar-details', // Replace with your actual route
                    method: 'POST',
                    data: {
                        tool: selectedTool
                    },
                    success: function (response) {
                        // Clear previous table content
                        webinarDetailsTable.querySelector('tbody').innerHTML = '';

                        // Append fetched details to the table
                        response.forEach(function (webinar) {
                            var row = webinarDetailsTable.querySelector('tbody').insertRow();
                            row.insertCell(0).textContent = webinar.title;
                            row.insertCell(1).textContent = webinar.start_date;
                            row.insertCell(2).textContent = webinar.end_date;
                        });

                        // Show or hide the table based on whether there are details to display
                        webinarDetailsTable.style.display = response.length > 0 ? 'table' : 'none';
                    },
                    error: function (error) {
                        console.error(error);
                    }
                });
            });
        });
    </script>
@endsection
