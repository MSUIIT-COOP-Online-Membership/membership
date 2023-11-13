@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Staff Details') }}</div>

                    <div class="card-body">
                        <div class="text-center">
                            @if ($staff->id_photo)
                                <img src="{{ asset('/images/id_photos/' . $staff->id_photo) }}" alt="ID Photo" class="img-fluid rounded-circle" style="max-width: 150px;">
                            @else
                                <div class="text-muted">No Photo</div>
                            @endif
                        </div>

                        <ul class="list-group mt-4">
                            <li class="list-group-item"><strong>Last Name:</strong> {{ $staff->lname }}</li>
                            <li class="list-group-item"><strong>Middle Name:</strong> {{ $staff->mname }}</li>
                            <li class="list-group-item"><strong>First Name:</strong> {{ $staff->fname }}</li>
                            <li class="list-group-item"><strong>Suffix:</strong> {{ $staff->suffix }}</li>
                            <li class="list-group-item"><strong>Sex:</strong> {{ $staff->sex }}</li>
                            <li class="list-group-item"><strong>Civil Status:</strong> {{ $staff->civil_status }}</li>
                            <li class="list-group-item"><strong>Date of Birth:</strong> {{ $staff->dob }}</li>
                            <li class="list-group-item"><strong>Age:</strong> {{ $staff->age }}</li>
                            <li class="list-group-item"><strong>Telephone Number:</strong> {{ $staff->tel_no }}</li>
                            <li class="list-group-item"><strong>Mobile Number:</strong> {{ $staff->mobile_no }}</li>
                            <li class="list-group-item"><strong>Email:</strong> {{ $staff->email }}</li>
                            <li class="list-group-item"><strong>Present Address:</strong> {{ $staff->present_address }}</li>
                            <li class="list-group-item"><strong>Position:</strong> {{ $staff->position }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
