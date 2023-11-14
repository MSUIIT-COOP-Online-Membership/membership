<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff / Profile</title>
    
@extends('layouts.app')
</head>
<body>
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"><a href="{{ route('staff.index') }}">Staff</a></li>
            <li class="breadcrumb-item active"> Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                        @if ($staff->id_photo)
                            <img src="{{ asset('images/id_photos/' . $staff->id_photo) }}" alt="ID Photo" class="img-fluid rounded-circle mx-auto d-block" style="max-width: 150px; max-height: 150px;">
                        @else
                            <div class="bg-light d-flex justify-content-center align-items-center rounded-circle mx-auto" style="width: 150px; height: 150px;">
                                <span class="text-muted">No ID Photo</span>
                            </div>
                        @endif
                </div>

                <h3 class="profile-username text-center">{{ $staff->fname }} {{ $staff->lname }}</h3>

                <p class="text-muted text-center">{{ $staff->position }}</p>

                <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                    <b>Age</b> <a class="float-right">{{ $staff->age }}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Sex</b> <a class="float-right">{{ $staff->sex }}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Civil Status</b> <a class="float-right">{{ $staff->civil_status }}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Date of Birth</b> <a class="float-right">{{ $staff->dob }}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Contact</b> <a class="float-right">{{ $staff->tel_no }} {{ $staff->mobile_no }}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Email</b> <a class="float-right">{{ $staff->email }}</a>
                  </li>

                  <li class="list-group-item">
                    <b>Address</b> <a class="float-right">{{ $staff->present_address }}</a>
                  </li>
                </ul>
                <a href="{{ route('staff.edit', $staff->id) }}" class="btn btn-primary btn-block"><b>Update</b></a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">About Me</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-book mr-1"></i> Educational Attainment</strong>

                <p class="text-muted">
                {{ $staff->educational_attainment }}
                </p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Present Address</strong>

                <p class="text-muted">{{ $staff->present_address }}</p>

                <hr>

                <strong><i class="fas fa-pencil-alt mr-1"></i>Employment Status</strong>

                <p class="text-muted">
                  <span class="tag tag-danger">{{ $staff->emp_stat }}</span>
                </p>

                <hr>

                <strong><i class="far fa-file-alt mr-1"></i> Application Date</strong>

                <p class="text-muted">{{ $staff->app_date }}</p>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#section1" data-toggle="tab">Personal Informartion</a></li>
                  <li class="nav-item"><a class="nav-link" href="#section2" data-toggle="tab">Employment</a></li>
                  <li class="nav-item"><a class="nav-link" href="#section3" data-toggle="tab">Family Background</a></li>
                  <li class="nav-item"><a class="nav-link" href="#section4" data-toggle="tab">Beneficiaries</a></li>
                  <li class="nav-item"><a class="nav-link" href="#section5" data-toggle="tab">Declaration</a></li>
                </ul>
              </div><!-- /.card-header -->

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
</body>
</html>