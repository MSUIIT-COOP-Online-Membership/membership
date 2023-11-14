@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit Member') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('members.update', ['member' => $member]) }}">
                            @csrf
                            @method('PUT')

                            <!-- Add your form fields here -->
                            <div class="form-group">
                                <label for="fname">{{ __('First Name') }}</label>
                                <input id="fname" type="text" class="form-control" name="fname" placeholder="Enter first name" value="{{ $member->fname }}" required>
                            </div>

                            <div class="form-group">
                                <label for="mname">{{ __('Middle Name') }}</label>
                                <input id="mname" type="text" class="form-control" name="mname" placeholder="Enter middle name" value="{{ $member->mname }}" required>
                            </div>

                            <div class="form-group">
                                <label for="lname">{{ __('Last Name') }}</label>
                                <input id="lname" type="text" class="form-control" name="lname" placeholder="Enter last name" value="{{ $member->lname }}" required>
                            </div>

                            <!-- Add more fields based on your Member model -->

                            <div class="form-group">
                                <button type="submit" class="btn btn-success"><i class="fas fa-check-circle mr-1"></i>{{ __('Update') }}</button>
                                <a href="{{ route('members.index') }}" class="btn btn-secondary"><i class="fas fa-times-circle mr-1"></i>{{ __('Cancel') }}</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
