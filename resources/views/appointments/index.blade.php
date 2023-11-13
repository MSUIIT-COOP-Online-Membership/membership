@extends('layouts.app')

@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">{{ __('Appointments') }}</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body p-0">

                        <!-- DataTable -->
                        <table class="table" id="appointmentsTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Member</th>
                                    <th>Branch</th>
                                    <th>Subject</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Status</th>
                                    <!-- Add more columns as needed -->
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($appointments as $appointment)
                                    <tr>
                                        <td>{{ $appointment->id }}</td>
                                        <td>{{ $appointment->member->fname }} {{ $appointment->member->lname }}</td>
                                        <td>{{ $appointment->branch->name }}</td>
                                        <td>{{ $appointment->subject }}</td>
                                        <td>{{ $appointment->date }}</td>
                                        <td>{{ $appointment->start_time }} - {{ $appointment->end_time }}</td>
                                        <td>{{ $appointment->status }}</td>
                                        <!-- Add more columns as needed -->
                                        <td>
                                            <a href="{{ route('appointments.show', $appointment->id) }}"
                                                class="btn btn-primary btn-sm">View</a>
                                            <a href="{{ route('appointments.edit', $appointment->id) }}"
                                                class="btn btn-warning btn-sm">Edit</a>
                                            <form action="{{ route('appointments.destroy', $appointment->id) }}"
                                                method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Are you sure you want to delete this appointment?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8">No appointments found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <!-- End DataTable -->

                    </div>
                    <!-- /.card-body -->

                </div>

            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->

@endsection
