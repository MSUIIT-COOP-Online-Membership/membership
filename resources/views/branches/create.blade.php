@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create Branch</div>

                    <div class="card-body">
                        <form method="post" action="{{ route('branches.store') }}">
                            @csrf

                            <!-- Branch Name -->
                            <div class="form-group">
                                <label for="name">Branch Name</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>

                            <!-- Manager -->
                            <div class="form-group">
                                <label for="manager">Manager</label>
                                <input type="text" class="form-control" id="manager" name="manager">
                            </div>

                            <!-- Address -->
                            <div class="form-group">
                                <label for="address">Address</label>
                                <textarea class="form-control" id="address" name="address" required></textarea>
                            </div>

                            <!-- Telephone Number -->
                            <div class="form-group">
                                <label for="tel_no">Telephone Number</label>
                                <input type="tel" class="form-control" id="tel_no" name="tel_no">
                            </div>

                            <!-- Mobile Number -->
                            <div class="form-group">
                                <label for="mobile_no">Mobile Number</label>
                                <input type="tel" class="form-control" id="mobile_no" name="mobile_no">
                            </div>

                            <!-- Email -->
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email">
                            </div>

                            <button type="submit" class="btn btn-primary">Create Branch</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
