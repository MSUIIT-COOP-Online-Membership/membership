@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Members') }}</h1>
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

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Gender</th>
                                        <th>Civil Status</th>
                                        <th>Date of Birth</th>
                                        <th>Actions</th> <!-- Add this column for actions -->
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($members as $member)
                                        <tr>
                                            <td>{{ $member->fname }} {{ $member->mname }} {{ $member->lname }} {{ $member->suffix }}</td>
                                            <td>{{ $member->email }}</td>
                                            <td>{{ $member->sex }}</td>
                                            <td>{{ $member->civil_status }}</td>
                                            <td>{{ $member->dob }}</td>
                                            <td>
                                                <a href="{{ route('members.edit', ['member' => $member]) }}" class="btn btn-primary">Edit</a>
                                                <form action="{{ route('members.destroy', $member->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this member?')">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer clearfix">
                            {{ $members->links() }}
                        </div>
                    </div>

                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
