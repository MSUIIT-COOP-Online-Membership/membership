@extends('layouts.datatable')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>DataTables</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">DataTables</li>
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
                            <table class="table" id="webinarsTable">
                                <thead>
                                    <tr>
                                        <th>Web Tool</th>
                                        <th>Date</th>
                                        <th>Start Time</th>
                                        <th>End Time</th>
                                        <th>Resource Speaker</th>
                                        <th>Web Link</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($webinars as $webinar)
                                        <tr>
                                            <td>{{ $webinar->web_tool }}</td>
                                            <td>{{ $webinar->date }}</td>
                                            <td>{{ $webinar->start_time }}</td>
                                            <td>{{ $webinar->end_time }}</td>
                                            <td>{{ $webinar->resource_speaker }}</td>
                                            <td>{{ $webinar->web_link }}</td>
                                            <td>
                                                <!-- View button with eye icon -->
                                                <a href="{{ route('webinars.show', ['webinar' => $webinar->id]) }}"
                                                    class="btn btn-info">
                                                    <i class="fas fa-eye"></i>
                                                </a>

                                                <!-- Edit button with pencil icon -->
                                                <a href="{{ route('webinars.edit', ['webinar' => $webinar->id]) }}"
                                                    class="btn btn-warning">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>

                                                <!-- Delete button with trash icon -->
                                                <form action="{{ route('webinars.destroy', $webinar->id) }}" method="POST"
                                                    style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger"
                                                        onclick="return confirm('Are you sure you want to delete this webinar?')">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
