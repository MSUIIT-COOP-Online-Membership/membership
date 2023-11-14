<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evaluations / List</title>
</head>
<body>
@extends('layouts.datatable')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>List of Evaluations</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('evaluations.index') }}">Evaluations</a></li>
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

                    <a href="{{ route('evaluations.create') }}" class="btn btn-success mb-3">
                            <i class="fas fa-plus-circle"></i> Add Evaluation
                        </a>

                        <!-- DataTable -->
                        <table class="table" id="advancedDataTable">
                            <thead>
                                <tr>
                                    <th>Member</th>
                                    <th>Branch</th>
                                    <th>Score</th>
                                    <th>Pass Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($evaluations as $evaluation)
                                    <tr>
                                        <td>{{ $evaluation->member->fname }} {{ $evaluation->member->mname }} {{ $evaluation->member->lname }} {{ $evaluation->member->suffix }}</td>
                                        <td>{{ $evaluation->branch->name }}</td>
                                        <td>{{ $evaluation->score }}</td>
                                        <td>{{ $evaluation->pass_status }}</td>
                                        <td>
                                            <!-- <a href="{{ route('evaluations.show', $evaluation->id) }}" class="btn btn-primary btn-sm">
                                                <i class="fas fa-eye"></i>
                                            </a> -->
                                            <a href="{{ route('evaluations.edit', $evaluation->id) }}" class="btn btn-warning btn-sm">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            
                                            <!-- Delete Button with SweetAlert Confirmation -->
                                            <button class="btn btn-danger btn-sm delete-btn" data-evaluation-id="{{ $evaluation->id }}">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6">No evaluation found.</td>
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
                const evaluationId = this.getAttribute('data-evaluation-id');

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
                        fetch(`{{ url("evaluations") }}/${evaluationId}`, {
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
                                Swal.fire('Deleted!', data.message, 'Deleted evaluation successfully.');
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
