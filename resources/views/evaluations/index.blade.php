@extends('layouts.app')

@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">{{ __('Evaluations') }}</h1>
            </div>
        </div>
    </div>
</div>

<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-body p-0">

                        <!-- DataTable -->
                        <table class="table" id="evaluationsTable">
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
                                @foreach ($evaluations as $evaluation)
                                    <tr>
                                        <td>{{ $evaluation->member->name }}</td>
                                        <td>{{ $evaluation->branch->name }}</td>
                                        <td>{{ $evaluation->score }}</td>
                                        <td>{{ $evaluation->pass_status }}</td>
                                        <td>
                                            <a href="{{ route('evaluations.show', $evaluation->id) }}" class="btn btn-info btn-sm">View</a>
                                            <a href="{{ route('evaluations.edit', $evaluation->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                            <!-- Add other actions as needed -->
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- End DataTable -->

                        {{ $evaluations->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- /.content -->

@endsection
