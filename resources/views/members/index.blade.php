<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Members / List</title>
</head>
<body>

@extends('layouts.datatable')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>List of Members</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('members.index') }}">Members</a></li>
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

                        <table class="table" id="advancedDataTable">
                            <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>ID Photo</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Gender</th>
                                        <th>Civil Status</th>
                                        <th>Date of Birth</th>
                                        <th>Actions</th> <!-- Add this column for actions -->
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($members as $member)
                                        <tr>
                                            <td>{{ $member->id }}</td>
                                            <td>
                                                @if ($member->id_photo)
                                                    <img src="{{ asset('images/id_photos/' . $member->id_photo) }}" alt="ID Photo" class="img-thumbnail" width="50" height="50">
                                                @else
                                                    No photo
                                                @endif
                                            </td>
                                            <td>{{ $member->fname }} {{ $member->mname }} {{ $member->lname }} {{ $member->suffix }}</td>
                                            <td>{{ $member->email }}</td>
                                            <td>{{ $member->sex }}</td>
                                            <td>{{ $member->civil_status }}</td>
                                            <td>{{ $member->dob }}</td>
                                            <td>
                                                <a href="{{ route('members.show', $member->id) }}" class="btn btn-primary btn-sm">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="{{ route('members.edit', $member->id) }}" class="btn btn-warning btn-sm">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                                
                                                <!-- Delete Button with SweetAlert Confirmation -->
                                                <button class="btn btn-danger btn-sm delete-btn" data-member-id="{{ $member->id }}">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @empty
                                    <tr>
                                        <td colspan="6">No member registered found.</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>

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
                const memberId = this.getAttribute('data-member-id');

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
                        // If member confirms, proceed with deletion
                        fetch(`{{ url("members") }}/${memberId}`, {
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
                                Swal.fire('Deleted!', data.message, 'Deleted member successfully.');
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