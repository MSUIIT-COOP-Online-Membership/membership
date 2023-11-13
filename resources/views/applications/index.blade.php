@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Application List') }}</div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Type</th>
                                    <th>Status</th>
                                    <th>Member</th>
                                    <th>Branch</th>
                                    <th>Approved By</th>
                                    <th>Payment</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($applications as $application)
                                    <tr>
                                        <td>{{ $application->id }}</td>
                                        <td>{{ $application->type }}</td>
                                        <td>{{ $application->status }}</td>
                                        <td>{{ $application->member->name }}</td>
                                        <td>{{ $application->branch->name }}</td>
                                        <td>{{ $application->staff->fname }} {{ $application->staff->lname }}</td>
                                        <td>{{ $application->payment->name }}</td>
                                        <td>
                                            <a href="{{ route('applications.show', $application->id) }}" class="btn btn-primary btn-sm">View</a>
                                            <a href="{{ route('applications.edit', $application->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                            <!-- Add delete button if you want to implement deletion -->
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8">No applications found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
