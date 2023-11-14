<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Members / Profile</title>
    
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
              <li class="breadcrumb-item active"><a href="{{ route('members.index') }}">Members</a></li>
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
                        @if ($member->id_photo)
                            <img src="{{ asset('images/id_photos/' . $member->id_photo) }}" alt="ID Photo" class="img-fluid rounded-circle mx-auto d-block" style="max-width: 150px; max-height: 150px;">
                        @else
                            <div class="bg-light d-flex justify-content-center align-items-center rounded-circle mx-auto" style="width: 150px; height: 150px;">
                                <span class="text-muted">No ID Photo</span>
                            </div>
                        @endif
                </div>

                <h3 class="profile-username text-center">{{ $member->fname }} {{ $member->lname }}</h3>

                <p class="text-muted text-center">COOP Member</p>

                <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                    <b>Age</b> <a class="float-right">{{ $member->age }}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Sex</b> <a class="float-right">{{ $member->sex }}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Civil Status</b> <a class="float-right">{{ $member->civil_status }}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Date of Birth</b> <a class="float-right">{{ $member->dob }}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Contact</b> <a class="float-right">{{ $member->tel_no }} {{ $member->mobile_no }}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Email</b> <a class="float-right">{{ $member->email }}</a>
                  </li>
                </ul>

                <a href="{{ route('members.edit', $member->id) }}" class="btn btn-primary btn-block"><b>Update</b></a>
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
                {{ $member->educational_attainment }}
                </p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Present Address</strong>

                <p class="text-muted">{{ $member->present_address }}</p>

                <hr>

                <strong><i class="fas fa-pencil-alt mr-1"></i>Employment Status</strong>

                <p class="text-muted">
                  <span class="tag tag-danger">{{ $member->emp_stat }}</span>
                </p>

                <hr>

                <strong><i class="far fa-file-alt mr-1"></i> Application Date</strong>

                <p class="text-muted">{{ $member->app_date }}</p>
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
              <div class="card-body">
                <div class="tab-content">

                <!-- /.Personal Information -->
                <div class="active tab-pane" id="section1">
                    <strong><i class="fas fa-user mr-1"></i> Personal Information</strong>
                    <hr>

                    <ul class="list-group">
                        <li class="list-group-item">
                            <i class="fas fa-user mr-2"></i><b>Last Name:</b> {{ $member->lname }}
                        </li>
                        <li class="list-group-item">
                            <i class="fas fa-user mr-2"></i><b>Middle Name:</b> {{ $member->mname }}
                        </li>
                        <li class="list-group-item">
                            <i class="fas fa-user mr-2"></i><b>First Name:</b> {{ $member->fname }}
                        </li>
                        <li class="list-group-item">
                            <i class="fas fa-user mr-2"></i><b>Suffix:</b> {{ $member->suffix }}
                        </li>
                        <li class="list-group-item">
                            <i class="fas fa-venus-mars mr-2"></i><b>Sex:</b> {{ $member->sex }}
                        </li>
                        <li class="list-group-item">
                            <i class="fas fa-ring mr-2"></i><b>Civil Status:</b> {{ $member->civil_status }}
                        </li>
                        <li class="list-group-item">
                            <i class="fas fa-calendar-alt mr-2"></i><b>Date of Birth:</b> {{ $member->dob }}
                        </li>
                        <li class="list-group-item">
                            <i class="fas fa-birthday-cake mr-2"></i><b>Age:</b> {{ $member->age }}
                        </li>
                        <li class="list-group-item">
                            <i class="fas fa-phone mr-2"></i><b>Telephone Number:</b> {{ $member->tel_no }}
                        </li>
                        <li class="list-group-item">
                            <i class="fas fa-mobile-alt mr-2"></i><b>Mobile Number:</b> {{ $member->mobile_no }}
                        </li>
                        <li class="list-group-item">
                            <i class="fas fa-praying-hands mr-2"></i><b>Religion:</b> {{ $member->religion }}
                        </li>
                        <li class="list-group-item">
                            <i class="fas fa-envelope mr-2"></i><b>Email:</b> {{ $member->email }}
                        </li>
                        <li class="list-group-item">
                            <i class="fas fa-map-marker-alt mr-2"></i><b>Place of Birth:</b> {{ $member->place_birth }}
                        </li>
                        <li class="list-group-item">
                            <i class="fas fa-home mr-2"></i><b>Present Address:</b> {{ $member->present_address }}
                        </li>
                        <li class="list-group-item">
                            <i class="fas fa-hourglass-start mr-2"></i><b>Duration of Residency:</b> {{ $member->duration_residency }}
                        </li>
                        <li class="list-group-item">
                            <i class="fas fa-users mr-2"></i><b>Living with Parents:</b> {{ $member->living_parents }}
                        </li>
                        <li class="list-group-item">
                            <i class="fas fa-home mr-2"></i><b>Type of House:</b> {{ $member->house }}
                        </li>
                        <li class="list-group-item">
                            <i class="fas fa-clock mr-2"></i><b>House Duration:</b> {{ $member->house_month }}
                        </li>
                        <li class="list-group-item">
                            <i class="fas fa-home mr-2"></i><b>Type of Lot:</b> {{ $member->lot }}
                        </li>
                        <li class="list-group-item">
                            <i class="fas fa-clock mr-2"></i><b>Lot Duration:</b> {{ $member->lot_month }}
                        </li>
                        <li class="list-group-item">
                            <i class="fas fa-id-card mr-2"></i><b>TIN:</b> {{ $member->tin }}
                        </li>
                        <li class="list-group-item">
                            <i class="fas fa-graduation-cap mr-2"></i><b>Educational Attainment:</b> {{ $member->educational_attainment }}
                        </li>
                    </ul>
                </div>


                 <!-- /.Employment -->
                <div class="tab-pane" id="section2">
                    <strong><i class="fas fa-briefcase mr-1"></i> Employment Information</strong>
                    <hr>
                    <ul class="list-group">
                        <li class="list-group-item">
                            <i class="fas fa-briefcase mr-2"></i><b>Employment Status:</b> {{ $member->emp_stat }}
                        </li>
                        <li class="list-group-item">
                            <i class="fas fa-briefcase mr-2"></i><b>Employment Type:</b> {{ $member->emp_type }}
                        </li>
                        <li class="list-group-item">
                            <i class="fas fa-briefcase mr-2"></i><b>Profession:</b> {{ $member->profession }}
                        </li>
                        <li class="list-group-item">
                            <i class="fas fa-briefcase mr-2"></i><b>Other Employment:</b> {{ $member->emp_others }}
                        </li>
                        <li class="list-group-item">
                            <i class="fas fa-industry mr-2"></i><b>Business Type:</b> {{ $member->business_type }}
                        </li>
                        <li class="list-group-item">
                            <i class="fas fa-money-bill mr-2"></i><b>Asset Size:</b> {{ $member->asset_size }}
                        </li>
                        <li class="list-group-item">
                            <i class="fas fa-building mr-2"></i><b>Employer Name:</b> {{ $member->employer_name }}
                        </li>
                        <li class="list-group-item">
                            <i class="fas fa-clock mr-2"></i><b>Service Length:</b> {{ $member->service_length }}
                        </li>
                        <li class="list-group-item">
                            <i class="fas fa-briefcase mr-2"></i><b>Employer Status:</b> {{ $member->employer_status }}
                        </li>
                        <li class="list-group-item">
                            <i class="fas fa-map-marker-alt mr-2"></i><b>Employer Address:</b> {{ $member->employer_address }}
                        </li>
                        <li class="list-group-item">
                            <i class="fas fa-phone mr-2"></i><b>Employer Contact:</b> {{ $member->employer_contact }}
                        </li>
                        <li class="list-group-item">
                            <i class="fas fa-money-bill mr-2"></i><b>Monthly Salary:</b> {{ $member->monthly_salary }}
                        </li>
                        <li class="list-group-item">
                            <i class="fas fa-industry mr-2"></i><b>Business Name:</b> {{ $member->business_name }}
                        </li>
                        <li class="list-group-item">
                            <i class="fas fa-id-card mr-2"></i><b>Business TIN:</b> {{ $member->business_tin }}
                        </li>
                        <li class="list-group-item">
                            <i class="fas fa-map-marker-alt mr-2"></i><b>Business Address:</b> {{ $member->business_address }}
                        </li>
                        <li class="list-group-item">
                            <i class="fas fa-phone mr-2"></i><b>Business Contact:</b> {{ $member->business_contact }}
                        </li>
                        <li class="list-group-item">
                            <i class="fas fa-calendar-alt mr-2"></i><b>Operation Duration:</b> {{ $member->op_duration_year }} years and {{ $member->op_duration_month }} months
                        </li>
                        <li class="list-group-item">
                            <i class="fas fa-users mr-2"></i><b>Number of Workers:</b> {{ $member->no_workers }}
                        </li>
                        <li class="list-group-item">
                            <i class="fas fa-money-bill mr-2"></i><b>Yearly Income:</b> {{ $member->yearly_income }}
                        </li>
                        <li class="list-group-item">
                            <i class="fas fa-coins mr-2"></i><b>Source of Income:</b> {{ $member->source_income }}
                        </li>
                        <li class="list-group-item">
                            <i class="fas fa-money-bill mr-2"></i><b>Monthly Income:</b> {{ $member->monthly_income }}
                        </li>
                    </ul>
                </div>

                  
                <!-- /.Family Background -->
                <div class="tab-pane" id="section3">
                    <strong><i class="fas fa-users mr-1"></i> Family Background</strong>
                    <hr>

                    <!-- Father's Information -->
                    <h5 class="mt-3 mb-2"><i class="fas fa-male mr-1"></i> Father's Information</h5>
                    <ul class="list-group">
                        <li class="list-group-item">
                            <i class="fas fa-user mr-2"></i><b>Last Name:</b> {{ $member->father_lname }}
                        </li>
                        <li class="list-group-item">
                            <i class="fas fa-user mr-2"></i><b>Middle Name:</b> {{ $member->father_mname }}
                        </li>
                        <li class="list-group-item">
                            <i class="fas fa-user mr-2"></i><b>First Name:</b> {{ $member->father_fname }}
                        </li>
                        <li class="list-group-item">
                            <i class="fas fa-user mr-2"></i><b>Suffix:</b> {{ $member->father_suffix }}
                        </li>
                        <li class="list-group-item">
                            <i class="fas fa-calendar-alt mr-2"></i><b>Date of Birth:</b> {{ $member->father_dob }}
                        </li>
                        <li class="list-group-item">
                            <i class="fas fa-birthday-cake mr-2"></i><b>Age:</b> {{ $member->father_age }}
                        </li>
                        <li class="list-group-item">
                            <i class="fas fa-phone mr-2"></i><b>Contact:</b> {{ $member->father_contact }}
                        </li>
                        <li class="list-group-item">
                            <i class="fas fa-briefcase mr-2"></i><b>Occupation:</b> {{ $member->father_occu }}
                        </li>
                    </ul>

                    <!-- Mother's Information -->
                    <h5 class="mt-3 mb-2"><i class="fas fa-female mr-1"></i> Mother's Information</h5>
                    <ul class="list-group">
                        <!-- Include similar list items for mother's information -->
                        <li class="list-group-item">
                            <i class="fas fa-user mr-2"></i><b>Last Name:</b> {{ $member->mother_lname }}
                        </li>
                        <li class="list-group-item">
                            <i class="fas fa-user mr-2"></i><b>Middle Name:</b> {{ $member->mother_mname }}
                        </li>
                        <li class="list-group-item">
                            <i class="fas fa-user mr-2"></i><b>First Name:</b> {{ $member->mother_fname }}
                        </li>
                        <li class="list-group-item">
                            <i class="fas fa-user mr-2"></i><b>Suffix:</b> {{ $member->mother_suffix }}
                        </li>
                        <li class="list-group-item">
                            <i class="fas fa-calendar-alt mr-2"></i><b>Date of Birth:</b> {{ $member->mother_dob }}
                        </li>
                        <li class="list-group-item">
                            <i class="fas fa-birthday-cake mr-2"></i><b>Age:</b> {{ $member->mother_age }}
                        </li>
                        <li class="list-group-item">
                            <i class="fas fa-phone mr-2"></i><b>Contact:</b> {{ $member->mother_contact }}
                        </li>
                        <li class="list-group-item">
                            <i class="fas fa-briefcase mr-2"></i><b>Occupation:</b> {{ $member->mother_occu }}
                        </li>
                    </ul>

                    <!-- Spouse's Information -->
                    <h5 class="mt-3 mb-2"><i class="fas fa-heart mr-1"></i> Spouse's Information</h5>
                    <ul class="list-group">
                        <!-- Include similar list items for spouse's information -->
                        <li class="list-group-item">
                            <i class="fas fa-user mr-2"></i><b>Last Name:</b> {{ $member->spouse_lname }}
                        </li>
                        <li class="list-group-item">
                            <i class="fas fa-user mr-2"></i><b>Middle Name:</b> {{ $member->spouse_mname }}
                        </li>
                        <li class="list-group-item">
                            <i class="fas fa-user mr-2"></i><b>First Name:</b> {{ $member->spouse_fname }}
                        </li>
                        <li class="list-group-item">
                            <i class="fas fa-user mr-2"></i><b>Suffix:</b> {{ $member->spouse_suffix }}
                        </li>
                        <li class="list-group-item">
                            <i class="fas fa-calendar-alt mr-2"></i><b>Date of Birth:</b> {{ $member->spouse_dob }}
                        </li>
                        <li class="list-group-item">
                            <i class="fas fa-birthday-cake mr-2"></i><b>Age:</b> {{ $member->spouse_age }}
                        </li>
                        <li class="list-group-item">
                            <i class="fas fa-phone mr-2"></i><b>Contact:</b> {{ $member->spouse_contact }}
                        </li>
                        <li class="list-group-item">
                            <i class="fas fa-briefcase mr-2"></i><b>Occupation:</b> {{ $member->spouse_occu }}
                        </li>
                        <li class="list-group-item">
                            <i class="fas fa-building mr-2"></i><b>Employer Name:</b> {{ $member->spouse_emp_name }}
                        </li>
                        <li class="list-group-item">
                            <i class="fas fa-briefcase mr-2"></i><b>Employment Status:</b> {{ $member->spouse_emp_stat }}
                        </li>
                        <li class="list-group-item">
                            <i class="fas fa-money-bill mr-2"></i><b>Monthly Income:</b> {{ $member->spouse_monthly_income }}
                        </li>
                    </ul>

                    <!-- Children Information -->
                    <h5 class="mt-3 mb-2"><i class="fas fa-child mr-1"></i> Children Information</h5>
                    <ul class="list-group">
                        <li class="list-group-item">
                            <i class="fas fa-child mr-2"></i><b>Number of Children:</b> {{ $member->no_child }}
                        </li>
                        <li class="list-group-item">
                            <i class="fas fa-child mr-2"></i><b>Number of Contributing Children:</b> {{ $member->no_child_contrib }}
                        </li>
                        <li class="list-group-item">
                            <i class="fas fa-money-bill mr-2"></i><b>Total Monthly Contribution:</b> {{ $member->total_monthly_contrib }}
                        </li>
                        <li class="list-group-item">
                            <i class="fas fa-child mr-2"></i><b>Number of Working Children:</b> {{ $member->no_child_work }}
                        </li>
                        <li class="list-group-item">
                            <i class="fas fa-child mr-2"></i><b>Number of Studying Children:</b> {{ $member->no_child_study }}
                        </li>
                        <li class="list-group-item">
                            <i class="fas fa-child mr-2"></i><b>Number of Not Studying Children:</b> {{ $member->no_child_notstudy }}
                        </li>
                    </ul>

                    <!-- Emergency Contact -->
                    <h5 class="mt-3 mb-2"><i class="fas fa-phone-alt mr-1"></i> Emergency Contact</h5>
                    <ul class="list-group">
                        <li class="list-group-item">
                            <i class="fas fa-user mr-2"></i><b>Name:</b> {{ $member->emer_name }}
                        </li>
                        <li class="list-group-item">
                            <i class="fas fa-phone mr-2"></i><b>Contact:</b> {{ $member->emer_contact }}
                        </li>
                        <li class="list-group-item">
                            <i class="fas fa-map-marker-alt mr-2"></i><b>Address:</b> {{ $member->emer_address }}
                        </li>
                    </ul>
                </div>

                  
                <!-- /.Declaration -->
                <div class="tab-pane" id="section5">
                    <strong><i class="fas fa-signature mr-1"></i> Declaration and Specimen Signature</strong>
                    <hr>

                    <!-- Declaration Information -->
                    <!-- <h5 class="mt-3 mb-2"><i class="fas fa-signature mr-1"></i> Declaration Information</h5> -->
                    <ul class="list-group">
                        <li class="list-group-item">
                            <i class="fas fa-pen-alt mr-2"></i><b>Electronic Signature:</b> {{ $member->e_signature }}
                        </li>
                        <li class="list-group-item">
                            <i class="fas fa-calendar-alt mr-2"></i><b>Application Date:</b> {{ $member->app_date }}
                        </li>
                    </ul>

                    <!-- Declaration Text -->
                    <div class="mt-3">
                        <p>
                            I hereby declare that the information provided above is true and correct to the best of my knowledge
                            and belief. I understand that any false statement may lead to the rejection of my application or
                            termination of membership.
                        </p>
                    </div>

                    <!-- Acceptance Checkbox -->
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="acceptanceCheckbox">
                        <label class="custom-control-label" for="acceptanceCheckbox">
                            I accept the terms and conditions
                        </label>
                    </div>

                    <!-- Submit Button -->
                    <div class="mt-3">
                        <button class="btn btn-primary" onclick="submitDeclaration()">
                            <i class="fas fa-check-circle mr-1"></i> Submit Declaration
                        </button>
                    </div>
                </div>

                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- Popper.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<!-- Activate Bootstrap Tab -->
<script>
  $(document).ready(function () {
    // Activate Bootstrap tab
    $('ul.nav.nav-pills a').on('click', function (e) {
      e.preventDefault();
      $(this).tab('show');
    });
  });
</script>

</body>
</html>