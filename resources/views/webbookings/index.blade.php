@extends('layouts.app')

@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">{{ __('Web Bookings') }}</h1>
            </div>
        </div>
    </div>
</div>

<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body p-0">

                        <!-- DataTable -->
                        <table class="table" id="webBookingsTable">
                            <thead>
                                <tr>
                                    <th>Member</th>
                                    <th>Webinar</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($webBookings as $webBooking)
                                    <tr>
                                        <td>{{ $webBooking->member->lname }}, {{ $webBooking->member->fname }} {{ $webBooking->member->mname }}</td>
                                        <td>{{ $webBooking->webinar->web_tool }}</td>
                                        <td>{{ $webBooking->status }}</td>
                                        <td>
                                            <a href="{{ route('webbookings.edit', $webBooking->id) }}" class="btn btn-primary btn-sm">Edit</a>

                                            <form action="{{ route('webbookings.destroy', $webBooking->id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this web booking?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- End DataTable -->

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- /.content -->

@endsection
