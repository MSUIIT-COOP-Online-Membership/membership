<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Webinar Bookings / List</title>
</head>
<body>

@extends('layouts.datatable')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>List of Webinar Bookings</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('webbookings.index') }}">Webinar Bookings</a></li>
                        <li class="breadcrumb-item active">List</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                        <!-- DataTable -->
                        <table class="table" id="advancedDataTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Member</th>
                                    <th>Webinar</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($webBookings as $webBooking)
                                    <tr>
                                        <td>{{ $webBooking->id }}</td>
                                        <td>{{ $webBooking->member->lname }}, {{ $webBooking->member->fname }} {{ $webBooking->member->mname }}</td>
                                        <td>{{ $webBooking->webinar->web_tool }}</td>
                                        <td>{{ $webBooking->webinar->date }}</td>
                                        <td>{{ $webBooking->webinar->start_time }} - {{ $webBooking->webinar->end_time }}</td>
                                        <td>{{ $webBooking->status }}</td>
                                        <td>

                                            <!-- Edit button with pencil icon -->
                                            <a href="{{ route('webbookings.edit', $webBooking->id) }}" class="btn btn-warning btn-sm">
                                            <i class="fas fa-pencil-alt"></i>
                                            </a>

                                            <!-- Delete Button with SweetAlert Confirmation -->
                                            <button class="btn btn-danger btn-sm delete-btn" data-webbooking-id="{{ $webBooking->id }}">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6">No webinar booking found.</td>
                                        </tr>
                                    @endforelse
                            </tbody>
                        </table>
                        <!-- End DataTable -->

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
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
            const webbookingId = this.getAttribute('data-webbooking-id');

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
                    fetch(`{{ url("webbookings") }}/${webbookingId}`, {
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
                            Swal.fire('Deleted!', data.message, 'Deleted webinar booking successfully.');
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