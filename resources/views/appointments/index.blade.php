<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointments / List</title>
</head>
<body>
@extends('layouts.datatable')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>List of Appointments</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('appointments.index') }}">Appointments</a></li>
                        <li class="breadcrumb-item active">List</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">

                    <a href="{{ route('appointments.create') }}" class="btn btn-success mb-3">
                            <i class="fas fa-plus-circle"></i> Add Appointment
                        </a>

                        <!-- DataTable -->
                        <table class="table" id="advancedDataTable">
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
                                            <a href="{{ route('appointments.edit', $appointment->id) }}" class="btn btn-warning btn-sm">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            
                                            <!-- Delete Button with SweetAlert Confirmation -->
                                            <button class="btn btn-danger btn-sm delete-btn" data-appointment-id="{{ $appointment->id }}">
                                                <i class="fas fa-trash"></i>
                                            </button>
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

</section>

<!-- Include SweetAlert Library -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- SweetAlert Script -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Add event listener to all delete buttons
        const deleteButtons = document.querySelectorAll('.delete-btn');
        deleteButtons.forEach(button => {
            button.addEventListener('click', function () {
                const appointmentId = this.getAttribute('data-appointment-id');

                // Display SweetAlert confirmation
                Swal.fire({
                    title: 'Are you sure?',
                    text: 'This action is irreversible.',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, delete it',
                    cancelButtonText: 'No, cancel'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // If user confirms, proceed with deletion
                        fetch(`{{ url("appointments") }}/${appointmentId}`, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                'Content-Type': 'application/json',
                                'Accept': 'application/json',
                            },
                        })
                        .then(response => response.json())
                        .then(data => {
                            // Check the response and show the SweetAlert accordingly
                            if (data.success) {
                                Swal.fire('Deleted!', data.message, 'Deleted appointment successfully.');
                                // Reload the page or update the UI as needed
                                location.reload();
                            } else {
                                Swal.fire('Error!', data.message, 'error');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            Swal.fire('Error!', 'An error occurred during deletion.', 'error');
                        });
                    }
                });
            });
        });
    });
</script>
@include('sweetalert::alert')
@endsection

</body>
</html>
