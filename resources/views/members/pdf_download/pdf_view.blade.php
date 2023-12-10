<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Black & White</title>
    <link rel="stylesheet" href="{{ asset('/assets/membershipapplication/css/pdf.css'); }}">
   
<body>


<section class="performance-facts">
  <header class="performance-facts__header">
  <div class="header-logo  navbar-expand-lg ">
        <a href="">
              <img src="C:\Users\Acer\membership\public\images\npmc-logo-nobg.png" alt="MSUIIT COOP"
                 class="brand-image img-circle elevation-4"
                 style="opacity: 1; width: 70px; height:70px;">
            <div class="brand-text"> <!-- Add some margin to separate the image and text -->
                <p class=" font-weight-bolder">MSU-IIT NATIONAL MULTI-PURPOSE COOPERATIVE</p>
                <p class="brand-slogan"> Join Us Grow With Us!</p>
            </div>
        </a>
</div>
  </header>
  <div class="divider">
    <h3>Personal Data</h3>
  </div>
  
  <div class="info">
  @foreach($members as $index => $members)
  <div class="input-group first-row">
        <label for="lname">Last Name</label>
        <input type="text" name="lname" class="form-input" id="lname" value='{{ $members->lname }}' readonly>
  </div>
  <div class="input-group first-row">
        <label for="fname">First Name</label>
        <input type="text" name="fname" class="form-input" id="fname" value='{{ $members->fname }}' readonly>
    </div>
    <div class="input-group">
        <label for="mname">Middle Name</label>
        <input type="text" name="mname" class="form-input" id="mname" value='{{ $members->mname }}' readonly />
    </div>

    <div class="input-group">
        <label for="suffix">Suffix</label>
        <input type="text" name="suffix" placeholder="Suffix" class="form-input" id="suffix" value='{{ $members->suffix}}' readonly />
    </div>
    <div class="input-group">
       <label for="sex">Sex</label>
      <input type="text" name="sex" class="form-input" id="sex" value='{{ $members->sex }}' readonly />
    </div>
    <div class="input-group">
        <label for="civil_status">Civil Status</label>
        <input type="text" name="civil_status" class="form-input" id="civil_status" value='{{ $members->civil_status }}' readonly />
    </div>

    <div class="input-group">
        <label for="dob">Date of Birth</label>
        <input type="text" name="dob" class="form-input" id="dob" value='{{ $members->dob }}' readonly />

    </div>

    <div class="input-group">
        <label for="age">Age</label>
        <input type="text" name="age" placeholder="Age" class="form-input" id="age" value='{{ $members->age }}' readonly />

    </div>

    <div class="input-group">
        <img src="#" class="id_pic">
    </div>

    <div class="input-group">
        <label for="tel_no">Telephone Number</label>
        <input type="text" name="tel_no" class="form-input" id="telephone_number" value='{{ $members->tel_no }}' readonly />
    </div>

    <div class="input-group">
        <label for="mobile_no">Mobile Number </label>
        <input type="text" name="mobile_no" class="form-input" id="mobile_number" value='{{ $members->mobile_no }}' readonly />

    </div>
    <div class="input-group">
        <label for="email">Email Address</label>
        <input type="text" name="email" class="form-input" id="email" value='{{ $members->email }}' readonly />

    </div>

    <div class="input-group">
        <label for="religion">Religion</label>
        <input type="text" name="religion" placeholder="Religion" class="form-input" id="religion" value='{{ $members->religion }}' readonly />

    </div>

    <div class="input-group">
        <label for="place_birth">Place of Birth</label>
        <input type="text" name="place_birth" placeholder="Place of Birth" class="form-input" id="place_birth" value='{{ $members->place_birth }}' readonly />

    </div>

    <div class="input-group">
        <label for="present_address">Present Address</label>
        <input type="text" name="present_address" class="form-input" id="present_address" value='{{ $members->present_address }}' readonly />

    </div>
  @endforeach

  @foreach($houses as $index => $house)
  <div class="input-group">
      <label for="duration_residency">Duration of Residency With Present Address</label>
      <input type="text" name="duration_residency" placeholder="No. of years/No. of months" class="form-input" id="duration_residency" value='{{ $house->duration_residency }}' readonly />

  </div><br>

  <div class="input-group">
      <label for="living_parents">Living With Parents</label>
      <input type="text" name="living_parents" class="form-input" id="living_parents" value='{{ $house->living_parents }}' readonly />
  </div><br>

  <div class="input-group">
      <label for="house">House</label>
      <input type="text" name="house" id="house" value='{{ $house->house }}' readonly>
  </div>

   <div class="input-group">
      <label for="house_month">House Rental/Mortgage Per Month</label>
      <input type="text" name="house_month" placeholder="House Rental/Mortgage Per Month" class="form-input" id="house_month" value='P{{ $house->house_month }}' readonly />
  </div><br>

  <div class="input-group">
      <label for="lot">Lot</label>
      <input type="text" name="lot" placeholder="Lot" class="form-input" id="lot" value='{{ $house->lot }}' readonly />

  </div>

  <div class="input-group">
      <label for="lot_month">Lot Rental/Mortgage Per Month</label>
      <input type="text" name="lot_month" placeholder="Lot Rental/Mortgage Per Month" class="form-input" id="lot_month" value='{{ $house->lot_month }}' readonly />

  </div>
  @endforeach

  <div class="input-group">
      <label for="tin">Tax Identification Number (TIN)</label>
      <input type="text" name="tin" placeholder="TIN" class="form-input" id="tin" value='{{ $members->tin }}' readonly />

  </div>

  <div class="input-group">
      <label for="educational_attainment">Educational Attainment</label>
      <input type="text" name="educational_attainment" id="educational_attainment" value='{{ $members->educational_attainment }}' readonly>

  </div>

  <div class="divider">
    <h3>Employment/Occupation/Business Data</h3>
  </div>

  @foreach($employments as $index => $employment)
  <div class="input-group first-row">
      <label for="emp_stat">Employment Status</label>
      <input type="text"name="emp_stat" id="emp_stat" value='{{ $employment->emp_stat }}' readonly>
  </div>
  <div class="input-group first-row">
      <label for="profession">Profession</label>
      <input type="text" name="profession" placeholder="Profession" class="form-input" id="profession" value='{{ $employment->profession }}' readonly />
  </div>

  <div class="input-group">
      <label for="emp_type">Employment Type</label>
      <input type="text" name="emp_type" id="emp_type" value='{{ $employment->emp_type }}' readonly>
  </div>

  <div class="input-group">
      <label for="emp_others">Employment Sub-Type</label>
      <input type="text" name="emp_others" id="emp_others" value='{{ $employment->emp_others }}' readonly>
  </div>
  <div class="input-group">
      <label for="business_type">Business Type</label>
      <input type="text" name="business_type" id="business_type" value='{{ $employment->business_type }}' readonly>
  </div>

  <div class="input-group">
      <label for="asset_size">Asset Size</label>
      <input type="text" name="asset_size" id="asset_size" value='{{ $employment->asset_size }}' readonly>
  </div>

  @endforeach
  <div class="divider">
    <h3>For Employed</h3>
  </div>
  @foreach($employers as $index => $employer)
  <div class="input-group first-row">
      <label for="employer_name">Name of Employer</label>
      <input type="text" name="employer_name" placeholder="Name of Employer" class="form-input" id="employer_name" value='{{ $employer->employer_name }}' readonly />
  </div>

  <div class="input-group first-row">
      <label for="service_length">Length of Service</label>
      <input type="text" name="service_length" placeholder="Length of Service" class="form-input" id="service_length" value='{{ $employer->service_length }}' readonly />
  </div>

  <div class="input-group">
      <label for="employer_status">Status of Employment</label>
      <input type="text" name="employer_status" id="employer_status" value='{{ $employer->employer_status }}' readonly>
  </div>

  <div class="input-group">
      <label for="employer_address">Address of Employer</label>
      <input type="text" name="employer_address" placeholder="Address of Employer" class="form-input" id="employer_address" value='{{ $employer->employer_address }}' readonly />
  </div>

  <div class="input-group">
      <label for="employer_contact">Employer's Contact No.</label>
      <input type="text" name="employer_contact" placeholder="Employer's Contact No." class="form-input" id="employer_contact" value='{{ $employer->employer_contact }}' readonly />
  </div>

  <div class="input-group">
      <label for="monthly_salary">Gross Monthly Salary</label>
      <input type="text" name="monthly_salary" id="monthly_salary" value='{{ $employer->monthly_salary }}' readonly>
  </div>
  @endforeach

  <div class="divider">
    <h3>For Those Who Have Existing Business</h3>
  </div>
  @foreach($businesses as $index => $business)
  <div class="input-group first-row">
      <label for="business_name">Registered Business Name</label>
      <input type="text" name="business_name" placeholder="Business Name" class="form-input" id="business_name" value='{{ $business->business_name }}' readonly />
  </div>

  <div class="input-group first-row">
      <label for="business_tin">Business T.I.N.</label>
      <input type="text" name="business_tin" placeholder="Business T.I.N." class="form-input" id="business_tin" value='{{ $business->business_tin }}' readonly />
  </div>

  <div class="input-group">
      <label for="business_address">Business Address</label>
      <input type="text" name="business_address" placeholder="Business Address" class="form-input" id="business_address" value='{{ $business->business_address }}' readonly />
  </div>

  <div class="input-group">
      <label for="business_contact">Business Contact Number</label>
      <input type="text" name="business_contact" placeholder="Business Contact Number" class="form-input" id="business_contact" value='{{ $business->business_contact }}' readonly />
  </div>

  <div class="input-group">
      <label for="business_duration">Duration of Operation</label>
      <input type="text" name="op_duration_year" placeholder="No. of Years" class="form-input" id="op_duration_year" value='{{ $business->op_duration_year }} Year/s' readonly />
      <input type="text" name="op_duration_month" placeholder="No. of Months" class="form-input" id="op_duration_month" value='{{ $business->op_duration_month }} Month/s' readonly />
  </div>

  <div class="input-group">
      <label for="no_workers">Number of Workers</label>
      <input type="text" name="no_workers" placeholder="No. of Workers" class="form-input" id="no_workers" value='{{ $business->no_workers }}' readonly />
  </div>

  <div class="input-group">
      <label for="yearly_income">Gross Yearly Income</label>
      <input type="text" name="yearly_income" id="yearly_income" value='{{ $business->yearly_income }}' readonly>
  </div>

  <div class="input-group">
      <label for="source_income">Other Source of Income/Funds</label>
      <input type="text" name="source_income" id="source_income" value='{{ $business->source_income }}' readonly>
  </div>

  <div class="input-group">
      <label for="monthly_income">Gross Monthly Income</label>
      <input type="text" name="monthly_income" id="monthly_income" value='{{ $business->monthly_income }}' readonly>
  </div>@endforeach

  <div class="divider next-page" style="margin-top: 50px !important;">
    <h3>Family Background</h3>
  </div>
  @foreach($fathers as $index => $father)
  <div class="input-group first-row">
      <label for="father_lname">Father's Last Name</label>
      <input type="text" name="father_lname" placeholder="Father's Last Name" class="form-input" id="father_lname" value='{{ $father->father_lname }}' readonly />

  </div>

  <div class="input-group first-row">
      <label for="father_fname">Father's First Name</label>
      <input type="text" name="father_fname" placeholder="Father's First Name" class="form-input" id="father_fname" value='{{ $father->father_fname }}' readonly />

  </div>

  <div class="input-group">
      <label for="father_mname">Father's Middle Name</label>
      <input type="text" name="father_mname" placeholder="Father's Middle Name" class="form-input" id="father_mname" value='{{ $father->father_mname }}' readonly />

  </div>

  <div class="input-group">
      <label for="father_suffix">Father's Suffix</label>
      <input type="text" name="father_suffix" placeholder="Father's Middle Name" class="form-input" id="father_suffix" value='{{ $father->father_suffix }}' readonly />

  </div>

  <div class="input-group">
      <label for="father_dob">Date of Birth</label>
      <input type="text" name="father_dob" class="form-input" id="father_dob" value='{{ $father->father_dob }}' readonly />

  </div>

  <div class="input-group">
      <label for="father_age">Age</label>
        <input type="text" name="father_age" placeholder="Age" class="form-input" id="father_age" value='{{ $father->father_age }}' readonly />

  </div>

  <div class="input-group">
      <label for="father_contact">Mobile Number</label>
      <input type="text" name="father_contact" placeholder="Mobile Number" class="form-input" id="father_contact" value='{{ $father->father_contact }}' readonly />

  </div>

  <div class="input-group">
      <label for="father_occu">Occupation</label>
      <input type="text" name="father_occu" placeholder="Occupation" class="form-input" id="father_occu" value='{{ $father->father_occu }}' readonly />
                        
  </div>
  @endforeach
  @foreach($mothers as $index => $mother)
  <div class="input-group">
      <label for="mother_lname">Mother's Last Name</label>
      <input type="text" name="mother_lname" placeholder="Mother's Last Name" class="form-input" id="mother_lname" value='{{ $mother->mother_lname }}' readonly />

  </div>

  <div class="input-group">
      <label for="mother_fname">Mother's First Name</label>
      <input type="text" name="mother_fname" placeholder="Mother's First Name" class="form-input" id="mother_fname" value='{{ $mother->mother_fname }}' readonly />

  </div>

  <div class="input-group">
      <label for="mother_mname">Mother's Middle Name</label>
      <input type="text" name="mother_mname" placeholder="Mother's Middle Name" class="form-input" id="mother_mname" value='{{ $mother->mother_mname }}' readonly />

  </div>
  <div class="input-group">
      <label for="mother_suffix">Mother's Suffix</label>
      <input type="text" name="mother_suffix" placeholder="Mother's Middle Name" class="form-input" id="mother_suffix" value='{{ $mother->mother_suffix }}' readonly />

  </div>

  <div class="input-group">
      <label for="mother_dob">Date of Birth</label>
      <input type="text" name="mother_dob" class="form-input" id="mother_dob" value='{{ $mother->mother_dob }}' readonly />

  </div>

  <div class="input-group">
      <label for="mother_age">Age</label>
      <input type="text" name="mother_age" placeholder="Age" class="form-input" id="mother_age" value='{{ $mother->mother_age }}' readonly />

  </div>

  <div class="input-group">
      <label for="mother_contact">Mobile Number</label>
      <input type="text" name="mother_contact" placeholder="Mobile Number" class="form-input" id="mother_contact" value='{{ $mother->mother_contact }}' readonly />

  </div>

  <div class="input-group">
      <label for="mother_occu">Occupation</label>
      <input type="text" name="mother_occu" placeholder="Occupation" class="form-input" id="mother_occu" value='{{ $mother->mother_occu }}' readonly />

  </div>
  @endforeach
  @foreach($spouses as $index => $spouse)
  <div class="input-group">
      <label for="spouse_lname">Spouse's Last Name</label>
      <input type="text" name="spouse_lname" placeholder="Spouse's Last Name" class="form-input" id="spouse_lname" value='{{ $spouse->spouse_lname }}' readonly />

  </div>

  <div class="input-group">
      <label for="spouse_fname">Spouse's First Name</label>
      <input type="text" name="spouse_fname" placeholder="Spouse's First Name" class="form-input" id="spouse_fname" value='{{ $spouse->souse_fname }}' readonly />

  </div>

  <div class="input-group">
      <label for="spouse_mname">Spouse's Middle Name</label>
      <input type="text" name="spouse_mname" placeholder="Spouse's Middle Name" class="form-input" id="spouse_mname" value='{{ $spouse->spouse_mname }}' readonly />

  </div>

  <div class="input-group">
      <label for="spouse_suffix">Spouse's Suffix</label>
      <input type="text" name="spouse_suffix" placeholder="Spouse's Suffix" class="form-input" id="spouse_suffix" value='{{ $spouse->spouse_suffix }}' readonly />

  </div>

  <div class="input-group">
      <label for="spouse_dob">Date of Birth</label>
      <input type="text" name="spouse_dob" class="form-input" id="spouse_dob" value='{{ $spouse->spouse_dob }}' readonly />

  </div>

  <div class="input-group">
      <label for="spouse_age">Age</label>
      <input type="text" name="spouse_age" placeholder="Age" class="form-input" id="spouse_age" value='{{ $spouse->spouse_age }}' readonly />

  </div>

  <div class="input-group">
      <label for="spouse_contact">Mobile Number</label>
      <input type="text" name="spouse_contact" placeholder="Mobile Number" class="form-input" id="spouse_contact" value='{{ $spouse->spouse_contact }}' readonly />

  </div>

  <div class="input-group">
      <label for="spouse_occu">Occupation</label>
      <input type="text" name="spouse_occu" placeholder="Occupation" class="form-input" id="spouse_occu" value='{{ $spouse->spouse_occu }}' readonly />

  </div>

  <div class="input-group">
      <label for="spouse_emp_name">Name of Employer</label>
      <input type="text" name="spouse_emp_name" placeholder="Name of Employer" class="form-input" id="spouse_emp_name" value='{{ $spouse->spouse_emp_name }}' readonly />

  </div>

  <div class="input-group">
      <label for="spouse_emp_stat">Employment Status</label>
      <input type="text" name="spouse_emp_stat" id="spouse_emp_stat" value='{{ $spouse->spouse_emp_stat }}' readonly>
  </div>

  <div class="input-group">
      <label for="spouse_monthly_income">Monthly Income</label>
      <input type="text" name="spouse_monthly_income" placeholder="Monthly Income" class="form-input" id="spouse_monthly_income" value='{{ $spouse->spouse_monthly_income }}' readonly />

  </div><hr>
  @endforeach
  @foreach($childrens as $index => $children)
  <div class="input-group first-row">
      <label for="no_child">No. of Children Living With You</label>
      <input type="text" name="no_child" placeholder="No. of Children Living With You" class="form-input" id="no_child" value='{{ $children->no_child }}' readonly />

  </div><br>

  <div class="input-group first-row">
      <label for="no_child_contrib">No. of Children Contributing to Household Income</label>
      <input type="text" name="no_child_contrib" placeholder="No. of Children Contributing to Household Income" class="form-input" id="no_child_contrib" value='{{ $children->no_child_contrib }}' readonly />

  </div>

  <div class="input-group">
      <label for="total_monthly_contrib">Total Monthly Contribution</label>
      <input type="text" name="total_monthly_contrib" placeholder="Total Monthly Contribution" class="form-input" id="total_monthly_contrib" value='{{ $children->total_monthly_contrib }}' readonly />

  </div>

  <div class="input-group">
      <label for="no_child_work">No. of Working Children</label>
      <input type="text" name="no_child_work" placeholder="No. of Working Children" class="form-input" id="no_child_work" value='{{ $children->no_child_work }}' readonly />

  </div>

  <div class="input-group">
      <label for="no_child_study">No. of Studying Children</label>
      <input type="text" name="no_child_study" placeholder="No. of NOT Studying Children" class="form-input" id="no_child_study" value='{{ $children->no_child_study }}' readonly />

  </div>

  <div class="input-group">
      <label for="no_child_notstudy">No. of NOT Studying Children</label>
      <input type="text" name="no_child_notstudy" placeholder="No. of Studying Children" class="form-input" id="no_child_notstudy" value='{{ $children->no_child_notstudy }}' readonly />

  </div>@endforeach

  <div class="input-group">
      <label for="house_yearly_income">HouseholdGross Yearly Income</label>
      <input type="text" name="house_yearly_income" id="house_yearly_income" value='{{ $members->house_yearly_income }}' readonly>
  </div><hr>
  @foreach($emergencies as $index => $emergency)
  <div class="tab-subhead">
      <h3>In case of Emergency</h3>
  </div>
  <div class="fields">
      <div class="input-group">
          <label for="emer_name">Name of Person/s To Be Notified</label>
          <input type="text" name="emer_name" placeholder="Name of Person/s To Be Notified" class="form-input" id="emer_name" value='{{ $emergency->emer_name }}' readonly />

      </div>

      <div class="input-group">
          <label for="emer_contact">Contact Number</label>
          <input type="text" name="emer_contact" placeholder="Contact Number" class="form-input" id="emer_contact" value='{{ $emergency->emer_contact }}' readonly />

      </div>

      <div class="input-group">
          <label for="emer_address">Address</label>
          <input type="text" name="emer_address" placeholder="Address" class="form-input" id="emer_address" value='{{ $emergency->emer_address }}' readonly />

      </div>
  @endforeach
  <div class="divider next-page" style="margin-top: 50px !important;">
    <h3>Beneficiaries</h3>
  </div>
  @foreach($beneficiaries as $index => $beneficiary)
      <div class="input-group">
          <label for="ben_lname">Last Name</label>
          <input type="text" name="ben_lname" placeholder="Last Name" class="form-input" id="ben_lname" value="{{ $beneficiary->ben_lname }}" readonly />

      </div>

      <div class="input-group">
          <label for="ben_fname">First Name</label>
          <input type="text" name="ben_fname" placeholder="First Name" class="form-input" id="ben_fname" value="{{ $beneficiary->ben_fname }}" readonly/>

      </div>

      <div class="input-group">
          <label for="ben_mname">Middle Name</label>
          <input type="text" name="ben_mname" placeholder="Middle Name" class="form-input" id="ben_mname" value="{{ $beneficiary->ben_mname }}" readonly/>

      </div>

      <div class="input-group">
          <label for="ben_suffix">Suffix</label>
          <input type="text" name="ben_suffix" placeholder="Suffix" class="form-input" id="ben_suffix" value="{{ $beneficiary->ben_suffix }}" readonly/>

      </div>

      <div class="input-group">
          <label for="ben_dob">Date of Birth</label>
          <input type="text" name="ben_dob" placeholder="Date of Birth" class="form-input" id="ben_dob" value="{{ $beneficiary->ben_dob }}" readonly/>

      </div>

      <div class="input-group" style="margin-bottom: 7px;">
          <label for="ben_relationship">Relationship</label>
          <input type="text" name="ben_relationship" placeholder="Relationship" class="form-input" id="ben_relationship" value="{{ $beneficiary->ben_relationship }}" readonly/>

      </div>
  @endforeach
  <div class="divider next-page" style="margin-top: 50px !important;">
    <h3>Declaration and Specimen Signature</h3>
  </div>
</section>
</body>
</html>