<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoices / List</title>
</head>
<body>

@extends('layouts.datatable')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>List of Invoices</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('payments.index') }}">Invoices</a></li>
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

                    <a href="{{ route('payments.create') }}" class="btn btn-success mb-3">
                            <i class="fas fa-plus-circle"></i> Add Payment
                        </a>
                        
                        <table class="table" id="advancedDataTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Member</th>
                                    <th>Branch</th>
                                    <th>Amount</th>
                                    <th>Coop Teller</th>
                                    <!-- Add more columns as needed -->
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($payments as $payment)
                                    <tr>
                                        <td>{{ $payment->id }}</td>
                                        <td>{{ $payment->member->lname }}, {{ $payment->member->fname }} {{ $payment->member->mname }}</td>
                                        <td>{{ $payment->branch->name }}</td>
                                        <td>{{ $payment->amount }}</td>
                                        <td>{{ $payment->staff->fname }} {{ $payment->staff->lname }}</td>
                                        <!-- Add more columns as needed -->
                                        <td>
                                            <a href="{{ route('payments.edit', $payment->id) }}" class="btn btn-warning btn-sm">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            
                                            <!-- Delete Button with SweetAlert Confirmation -->
                                            <button class="btn btn-danger btn-sm delete-btn" data-payment-id="{{ $payment->id }}">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6">No payments found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
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
                const paymentId = this.getAttribute('data-payment-id');

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
                        fetch(`{{ url("payments") }}/${paymentId}`, {
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
                                Swal.fire('Deleted!', data.message, 'Deleted payment successfully.');
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
