@extends('layouts.home')

@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">{{ __('Branches') }}</h1>
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

                        <!-- DataTable -->
                        <table class="table" id="branchesTable">
                            <thead>
                                <tr>
                                    <th>Branch Name</th>
                                    <th>Manager</th>
                                    <th>Address</th>
                                    <th>Tel No</th>
                                    <th>Mobile No</th>
                                    <th>Email</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($branches as $branch)
                                    <tr>
                                        <td>{{ $branch->name }}</td>
                                        <td>{{ $branch->manager }}</td>
                                        <td>{{ $branch->address }}</td>
                                        <td>{{ $branch->tel_no }}</td>
                                        <td>{{ $branch->mobile_no }}</td>
                                        <td>{{ $branch->email }}</td>
                                        <td>
                                            <a href="{{ route('branches.edit', ['branch' => $branch]) }}"
                                                class="btn btn-primary">Edit</a>
                                            <form action="{{ route('branches.destroy', $branch->id) }}" method="POST"
                                                style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger"
                                                    onclick="return confirm('Are you sure you want to delete this branch?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
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

@endsection
