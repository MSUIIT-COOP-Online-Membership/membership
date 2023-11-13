@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Branch</div>

                    <div class="card-body">
                        <form method="post" action="{{ route('branches.update', $branch->id) }}">
                            @csrf
                            @method('PUT') {{-- Use PUT method for updates --}}

                            <!-- Branch Name -->
                            <div class="form-group">
                                <label for="name">Branch Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $branch->name }}" required>
                            </div>

                            <!-- Branch Manager -->
                            <div class="form-group">
                                <label for="manager">Branch Manager</label>
                                <input type="text" class="form-control" id="manager" name="manager" value="{{ $branch->manager }}" required>
                            </div>

                            <!-- Branch Address -->
                            <div class="form-group">
                                <label for="address">Branch Address</label>
                                <textarea class="form-control" id="address" name="address" required>{{ $branch->address }}</textarea>
                            </div>

                            <!-- Branch Telephone Number -->
                            <div class="form-group">
                                <label for="tel_no">Telephone Number</label>
                                <input type="text" class="form-control" id="tel_no" name="tel_no" value="{{ $branch->tel_no }}">
                            </div>

                            <!-- Branch Mobile Number -->
                            <div class="form-group">
                                <label for="mobile_no">Mobile Number</label>
                                <input type="text" class="form-control" id="mobile_no" name="mobile_no" value="{{ $branch->mobile_no }}">
                            </div>

                            <!-- Branch Email -->
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ $branch->email }}" required>
                            </div>

                            <!-- Submit Button -->
                            <button type="submit" class="btn btn-primary">Update Branch</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
