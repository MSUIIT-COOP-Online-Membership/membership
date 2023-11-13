@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Staff List') }}</div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Last Name</th>
                                    <th>First Name</th>
                                    <th>Position</th>
                                    <th>ID Photo</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($staffMembers as $staff)
                                    <tr>
                                        <td>{{ $staff->id }}</td>
                                        <td>{{ $staff->lname }}</td>
                                        <td>{{ $staff->fname }}</td>
                                        <td>{{ $staff->position }}</td>
                                        <td>
                                            @if ($staff->id_photo)
                                                <img src="{{ asset('/images/id_photos/' . $staff->id_photo) }}" alt="ID Photo" style="max-width: 100px; max-height: 100px;">
                                            @else
                                                No Photo
                                            @endif



                                        </td>
                                        <!-- Add more columns as needed -->
                                        <td>
                                            <a href="{{ route('staff.show', $staff->id) }}" class="btn btn-primary btn-sm">View</a>
                                            <a href="{{ route('staff.edit', $staff->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                            <!-- Add delete button if you want to implement deletion -->
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6">No staff members found.</td>
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
