<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NMPC Membership Application</title>
    <link rel="stylesheet" href="{{ asset('/assets/premembershipform/css/premembership.css'); }}">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">

    <link rel="stylesheet" href="{{ asset('/assets/premembershipform/css/header.css'); }}">
    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

</head>

<body>
@include('guest.header')
    <main>
        <header>
            <h1>Membership Form</h1>
        </header>
        <div>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>

        <div class="box-custom">
            <!-- progressive bar -->
            <div class="progress-wrap">
                <div class="step active-prog-first ">Personal Data</div>
                <div class="step">Employment/Occupation/ Business Data</div>
                <div class="step">Family Background</div>
                <div class="step">Beneficiaries</div>
                <div class="step">Declaration</div>
            </div>
            <!-- form -->
            <div class="form-container">
                <form method="POST" action="{{ route('members.membershipform.edit', ['usercode' => $members->usercode]) }}" enctype="multipart/form-data" id="form">
                    @csrf

                    <!-- Welcome Page -->
                    <div class="tabpanel show">

                        <!-- Personal Information -->
                        <div class="tab-header">
                            <h3>Personal Information</h3>
                        </div>
                        <div class="tab-subhead mt-4">
                            <div><h6>Basic Information</h6><hr></div>
                            <!-- <h3>Basic Information</h3> -->
                        </div>
                        <div class="row g-3">
                            <div class="col-md-4">
                                <input type="hidden" name="members_id" class="form-input" id="members_id" value='{{ $members->id }}' readonly>
                                <input type="hidden" name="members_usercode" class="form-input" id="members_usercode" value='{{ $members->usercode }}' readonly>
                                <div class="input-group">
                                    <label for="lname">Last Name</label>
                                    <input type="text" name="lname" class="form-input" id="lname" value='{{ $members->lname }}' readonly>
                                    <span class="field-message">This field is required</span>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="input-group">
                                    <label for="fname">First Name</label>
                                    <input type="text" name="fname" class="form-input" id="fname" value='{{ $members->fname }}' readonly>
                                    <span class="field-message">This field is required</span>

                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="input-group">
                                    <label for="mname">Middle Name</label>
                                    <input type="text" name="mname" class="form-input" id="mname" value='{{ $members->mname }}' readonly />
                                    <span class="field-message">This field is required</span>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="input-group">
                                    <label for="suffix">Suffix</label>
                                    <input type="text" name="suffix" placeholder="Suffix" class="form-input" id="suffix" />
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="input-group">
                                    <label for="sex">Sex</label>
                                    <input type="text" name="sex" class="form-input" id="sex" value='{{ $members->sex }}' readonly />
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="input-group">
                                    <label for="civil_status">Civil Status</label>
                                    <input type="text" name="civil_status" class="form-input" id="civil_status" value='{{ $members->civil_status }}' readonly />
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="input-group">
                                    <label for="dob">Date of Birth</label>
                                    <input type="date" name="dob" class="form-input" id="dob" value='{{ $members->dob }}' readonly />
                                    <span class="field-message">This field is required</span>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="input-group">
                                    <label for="age">Age</label>
                                    <input type="number" name="age" placeholder="Age" class="form-input" id="age" required /> <!-- required -->
                                    <span class="field-message">This field is required</span>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="input-group">
                                    <label for="tel_no">Telephone Number (optional)</label>
                                    <input type="number" name="tel_no" class="form-input" id="telephone_number" value='{{ $members->tel_no }}' readonly />
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="input-group">
                                    <label for="mobile_no">Mobile Number </label>
                                    <input type="number" name="mobile_no" class="form-input" id="mobile_number" value='{{ $members->mobile_no }}' readonly />
                                    <span class="field-message">This field is required</span>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="input-group">
                                    <label for="email">Email Address</label>
                                    <input type="text" name="email" class="form-input" id="email" value='{{ $members->email }}' readonly />
                                    <span class="field-message">This field is required</span>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="input-group">
                                    <label for="religion">Religion</label>
                                    <input type="text" name="religion" placeholder="Religion" class="form-input" id="religion" required/> <!-- required -->
                                    <span class="field-message">This field is required</span>
                                </div>
                            </div>

                            <div class='col-md-12'><hr/></div>
                            <div class="col-md-6 mt-4">
                                <div class="input-group">
                                    <label for="place_birth">Place of Birth</label>
                                    <input type="text" name="place_birth" placeholder="Place of Birth" class="form-input" id="place_birth"  required/> <!-- required -->
                                    <span class="field-message">This field is required</span>
                                </div>
                            </div>

                            <div class="col-md-6 mt-4">
                                <div class="input-group">
                                    <label for="present_address">Present Address</label>
                                    <input type="text" name="present_address" class="form-input" id="present_address" value='{{ $members->present_address }}' readonly />
                                    <span class="field-message">This field is required</span>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="input-group">
                                <label for="duration_residency">Duration of Residency With Present Address</label>
                                <input type="text" name="duration_residency" placeholder="No. of years/No. of months" class="form-input" id="duration_residency"  required/> <!-- required -->
                                <span class="field-message">This field is required</span>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="input-group">
                                <label for="living_parents">Living With Parents</label>
                                <select name="living_parents" id="living_parents" required> <!-- required -->
                                    <option value="">Living With Parents?</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                                <span class="field-message">This field is required</span>
                            </div>
                            </div>

                            <div class="col-md-6">
                                <div class="input-group">
                                <label for="house">House</label>
                                <select name="house" id="house" > <!-- required -->
                                    <option value="">House</option>
                                    <option value="Own">Own</option>
                                    <option value="Rent">Rent</option>
                                    <option value="Mortgage">Mortgage</option>
                                </select>
                                <span class="field-message">This field is required</span>
                            </div>
                            </div>

                            <div class="col-md-6">
                                <div class="input-group">
                                <label for="house_month">House Rental/Mortgage Per Month</label>
                                <input type="number" name="house_month" placeholder="House Rental/Mortgage Per Month" class="form-input" id="house_month" />
                                <span class="field-message">This field is required</span>
                            </div>
                            </div>

                            <div class="col-md-6">
                                <div class="input-group">
                                <label for="lot">Lot</label>
                                <select name="lot" id="lot"> <!-- required -->
                                    <option value="">Lot</option>
                                    <option value="Own">Own</option>
                                    <option value="Rent">Rent</option>
                                    <option value="Mortgage">Mortgage</option>
                                </select>
                                <span class="field-message">This field is required</span>
                            </div>
                            </div>

                            <div class="col-md-6">
                                <div class="input-group">
                                <label for="lot_month">Lot Rental/Mortgage Per Month</label>
                                <input type="number" name="lot_month" placeholder="Lot Rental/Mortgage Per Month" class="form-input" id="lot_month" />
                                <span class="field-message">This field is required</span>
                            </div>
                            </div>

                            <div class="col-md-6">
                                <div class="input-group">
                                <label for="tin">TIN</label>
                                <input type="number" name="tin" placeholder="TIN" class="form-input" id="tin" required/> <!-- required -->
                                <span class="field-message">This field is required</span>
                            </div>
                            </div>

                            <div class="col-md-6">
                                <div class="input-group">
                                <label for="educational_attainment">Educational Attainment</label>
                                <select name="educational_attainment" id="educational_attainment" required> <!-- required -->
                                    <option value="">Educational Attainment</option>
                                    <option value="Elementary Level">Elementary Level</option>
                                    <option value="Elementary Graduate">Elementary Graduate</option>
                                    <option value="Highschool Level">Highschool Level</option>
                                    <option value="Highschool Graduate">Highschool Graduate</option>
                                    <option value="College Level">College Level</option>
                                    <option value="College Graduate">College Graduate</option>
                                    <option value="Graduate">Graduate</option>
                                    <option value="Post_Graduate">Post-Graduate</option>
                                </select>
                                <span class="field-message">This field is required</span>
                            </div>
                            </div>

                            <div class="col">
                                <div class="input-group">
                                    <label for="image">ID Picture</label>
                                    <input type="file" name="image" class="form-input" id="image" required /> <!-- required -->
                                    <span class="field-message">This field is required</span>
                                </div>
                            </div>
                        </div>

                        <div class="btns-group" style="justify-content: flex-end !important;">
                            <button type="button" class="btn btn-next btn-primary">Next</button>
                        </div>
                    </div>

                    
                    <!-- Employment/Occupation/Business Data-->
                    <div class="tabpanel ">
                        <div class="tab-header">
                            <h3>Employment/Occupation/Business Data</h3>
                        </div>
                        <div class="tab-subhead  mt-4">
                            <div><h6>Basic Information</h6><hr></div>
                        </div>
                        
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="input-group">
                                    <label for="emp_stat">Employment Status</label>
                                    <select name="emp_stat" id="emp_stat" required> <!-- required -->
                                        <option value="">Employment Status</option>
                                        <option value="Private Employee">Private Employee</option>
                                        <option value="Government Employee">Government Employee</option>
                                        <option value="Regular">Regular</option>
                                        <option value="Contractual">Contractual</option>
                                        <option value="Casual">Casual</option>
                                        <option value="Job Order">Job Order</option>
                                    </select>
                                    <span class="field-message">This field is required</span>
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="input-group">
                                    <label for="profession">Profession</label>
                                    <input type="text" name="profession" placeholder="Profession" class="form-input" id="profession" required /> <!-- required -->
                                    <span class="field-message">This field is required</span>
                                </div>
                            </div>

                            <div class="col-md-6">
                            <div class="input-group">
                                <label for="emp_type">Employment Type</label>
                                <select name="emp_type" id="emp_type"  onchange="updateSubTypeOptions()" required> <!-- required -->
                                    <option value="">Employment Type</option>
                                    <option value="Office Worker">Office Worker</option>
                                    <option value="Skilled Worker">Skilled Worker</option>
                                    <option value="Overseas Filipino Worker (OFW)">Overseas Filipino Worker (OFW)</option>
                                    <option value="Laborer/Helper">Laborer/Helper</option>
                                    <option value="Church Worker/Servant">Church Worker/Servant</option>
                                    <option value="Home Based (online job)">Home Based (online job)</option>
                                    <option value="Self-Employed (Professional)">Self-Employed (Professional)</option>
                                    <option value="Self-Employed (Non-Professional)">Self-Employed (Non-Professional)</option>
                                    <option value="Business Owner">Business Owner</option>
                                    <option value="Farmer">Farmer</option>
                                    <option value="Fisher Folk">Fisher Folk</option>
                                    <option value="Indigenous People">Indigenous People</option>
                                    <option value="House Wife">House Wife</option>
                                    <option value="Person With Reduced Mobility (PRM)">Person With Reduced Mobility (PRM)</option>
                                    <option value="Retiree">Retiree</option>
                                    <option value="Pensioner">Pensioner</option>
                                    <option value="Rebel Returnees">Rebel Returnees</option>
                                    <option value="Youth/Student">Youth/Student</option>
                                    <option value="Others">Others, Please Specify</option>
                                </select>

                                <span class="field-message">This field is required</span>
                            </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="input-group" id="typeOtherInputContainer" style="display: none;">
                                <label for="emp_type">Others, Please Specify</label>
                                <input type="text" name="emp_type" placeholder="Others, Please Specify" class="form-input" id="emp_type" />
                                <span class="field-message">This field is required</span>
                            </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="input-group" id="empSubTypeInputContainer" style="display: none;">
                                <label for="emp_others">Employment Sub-Type</label>
                                <select name="emp_others" id="emp_others">
                                    <option value="">Employment Sub-Type</option>
                                </select>

                                <span class="field-message">This field is required</span>
                            </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="input-group" id="businessInputContainer" style="display: none;">
                                <label for="business_type">Business Type</label>
                                <input type="text" name="business_type" placeholder="Business Type" class="form-input" id="business_type" />
                                <span class="field-message">This field is required</span>
                            </div>
                            </div>

                            <div class="col-md-6">
                                <div class="input-group" id="assetSizeInputContainer" style="display: none;">
                                    <label for="asset_size">Asset Size</label>
                                    <select name="asset_size" id="asset_size">
                                        <option value="">Employment Sub-Type</option>
                                        <option value="PHP100,000-PHP1,000,000">PHP100,000-PHP1,000,000</option>
                                        <option value="PHP1,000,001-PHP5,000,000">PHP1,000,001-PHP5,000,000</option>
                                        <option value="PHP5,000,001-PHP10,000,000">PHP5,000,001-PHP10,000,000</option>
                                        <option value="Above 10,000,001">Above 10,000,001</option>
                                    </select>
                                    <span class="field-message">This field is required</span>
                                </div>
                            </div>
                        </div>
                            
                        

                        <div class="tab-subhead mt-4 mb-3">
                            <div><h6>For Employed</h6><hr></div>
                        </div>
                        
                        <div class="row g-3">

                            <div class="col-md-6">
                                <div class="input-group">
                                    <label for="employer_name">Name of Employer</label>
                                    <input type="text" name="employer_name" placeholder="Name of Employer" class="form-input" id="employer_name" />
                                </div>   
                            </div>

                            <div class="col-md-6">
                                <div class="input-group">
                                    <label for="service_length">Length of Service</label>
                                    <input type="text" name="service_length" placeholder="Length of Service" class="form-input" id="service_length" />
                                </div>    
                            </div>
                            
                            <div class="col-md-6">
                                <div class="input-group">
                                    <label for="employer_status">Status of Employment</label>
                                    <select name="employer_status" id="employer_status">
                                        <option value="">Status of Employment</option>
                                        <option value="Regular">Regular</option>
                                        <option value="Contractual">Contractual</option>
                                        <option value="Casual">Casual</option>
                                        <option value="Job Order">Job Order</option>
                                    </select>
                                </div>   
                            </div>

                            <div class="col-md-6">
                                <div class="input-group">
                                    <label for="employer_address">Address of Employer</label>
                                    <input type="text" name="employer_address" placeholder="Address of Employer" class="form-input" id="employer_address" />
                                </div>   
                            </div>
                            
                            <div class="col-md-6">
                                <div class="input-group">
                                    <label for="employer_contact">Employer's Contact No.</label>
                                    <input type="text" name="employer_contact" placeholder="Employer's Contact No." class="form-input" id="employer_contact" />
                                </div>    
                            </div>
                           
                            <div class="col-md-6">
                                <div class="input-group">
                                    <label for="monthly_salary">Gross Monthly Salary</label>
                                    <select name="monthly_salary" id="monthly_salary">
                                        <option value="">Gross Monthly Salary</option>
                                        <option value="Below P10,000">Below P10,000</option>
                                        <option value="P10,000-P19,999">P10,000-P19,999</option>
                                        <option value="P20,000-P49,999">P20,000-P49,999</option>
                                        <option value="P50,000-P99,999">P50,000-P99,999</option>
                                        <option value="Above P100,000">Above P100,000</option>
                                    </select>
                                </div>    
                            </div>
                        </div>
                            
                        
                        

                        <div class="tab-subhead mt-4">
                            <div><h6>For Those Who Have Existing Business</h6><hr></div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-group">
                                <label for="business_name">Registered Business Name</label>
                                <input type="text" name="business_name" placeholder="Business Name" class="form-input" id="business_name" />
                            </div>
                            </div>

                            <div class="col-md-6">
                                <div class="input-group">
                                <label for="business_tin">Business T.I.N.</label>
                                <input type="text" name="business_tin" placeholder="Business T.I.N." class="form-input" id="business_tin" />
                            </div>
                            </div>

                            <div class="col-md-6">
                                <div class="input-group">
                                <label for="business_address">Business Address</label>
                                <input type="text" name="business_address" placeholder="Business Address" class="form-input" id="business_address" />
                            </div>
                            </div>

                            <div class="col-md-6">
                                <div class="input-group">
                                <label for="business_contact">Business Contact Number</label>
                                <input type="text" name="business_contact" placeholder="Business Contact Number" class="form-input" id="business_contact" />
                            </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="input-group">
                                <label for="business_duration">Duration of Operation</label>
                                <input type="number" name="op_duration_year" placeholder="No. of Years" class="form-input" id="op_duration_year" />
                                <input type="number" name="op_duration_month" placeholder="No. of Months" class="form-input" id="op_duration_month" />
                            </div>
                            
                            </div>

                            <div class="col-md-6">
                                <div class="input-group">
                                <label for="no_workers">Number of Workers</label>
                                <input type="number" name="no_workers" placeholder="No. of Workers" class="form-input" id="no_workers" />
                            </div>
                            </div>

                            <div class="col-md-6">
                                <div class="input-group">
                                <label for="yearly_income">Gross Yearly Income</label>
                                <select name="yearly_income" id="yearly_income">
                                    <option value="">Gross Monthly Salary</option>
                                    <option value="Below P50,000">Below P50,000</option>
                                    <option value="P50,000-P149,999">P50,000-P149,999</option>
                                    <option value="P150,000-P249,999">P150,000-P249,999</option>
                                    <option value="P250,000-P349,999">P250,000-P349,999</option>
                                    <option value="P350,000-P449,999">P350,000-P449,999</option>
                                    <option value="P450,000-P549,999">P450,000-P549,999</option>
                                    <option value="P550,000-P649,999">P550,000-P649,999</option>
                                    <option value="P650,000-P749,999">P650,000-P749,999</option>
                                    <option value="P750,000-P849,999">P750,000-P849,999</option>
                                    <option value="P850,000-P949,999">P850,000-P949,999</option>
                                    <option value="P950,000-P1,299,999">P950,000-P1,299,999</option>
                                    <option value="P1,300,000-P1,499,999">P1,300,000-P1,499,999</option>
                                    <option value="P1,500,000-P1,799,999">P1,500,000-P1,799,999</option>
                                    <option value="P1,800,000-P2,000,000">P1,800,000-P2,000,000</option>
                                    <option value="Above P2,000,000">Above P2,000,000</option>
                                </select>
                            </div>
                            </div>

                            <div class="col-md-6">
                                <div class="input-group">
                                <label for="source_income">Other Source of Income/Funds</label>
                                <select name="source_income" id="source_income">
                                    <option value="">Other Source of Income</option>
                                    <option value="Pension">Pension</option>
                                    <option value="Regular Remittance">Regular Remittance</option>
                                    <option value="Investment">Investment</option>
                                </select>
                            </div>
                            </div>
                            

                            <div class="col-md-6">
                                <div class="input-group">
                                <label for="monthly_income">Gross Monthly Income</label>
                                <select name="monthly_income" id="monthly_income">
                                    <option value="">Gross Monthly Income</option>
                                    <option value="Below P10,000">Below P10,000</option>
                                    <option value="P10,000-P19,999">P10,000-P19,999</option>
                                    <option value="P20,000-P49,999">P20,000-P49,999</option>
                                    <option value="P50,000-P99,999">P50,000-P99,999</option>
                                    <option value="Above P100,000">Above P100,000</option>
                                </select>
                            </div>
                            </div>
                        </div>

                        <div class="btns-group">
                            <a href="#" class="btn-prev"><i class='bx bx-chevron-left'></i>Back</a>
                            <button type="button" class="btn btn-next btn-primary">Next</button>
                        </div>
                    </div>

                    <!-- Family Background -->
                    <div class="tabpanel ">
                        <div class="tab-header">
                            <h3>Family Background</h3>
                        </div>
                        <div class="tab-subhead mt-4">
                            <div><h6>Basic Information</h6><hr></div>
                        </div>
                        <div class="row g3">
                            <div class="col-md-4">
                               <div class="input-group">
                                <label for="father_lname">Father's Last Name</label>
                                <input type="text" name="father_lname" placeholder="Father's Last Name" class="form-input" id="father_lname" required /> <!-- required -->
                                <span class="field-message">This field is required</span>
                            </div> 
                            </div>

                            <div class="col-md-4">
                                <div class="input-group">
                                <label for="father_fname">Father's First Name</label>
                                <input type="text" name="father_fname" placeholder="Father's First Name" class="form-input" id="father_fname" required /> <!-- required -->
                                <span class="field-message">This field is required</span>
                            </div>
                            </div>

                            <div class="col-md-4">
                                <div class="input-group">
                                <label for="father_mname">Father's Middle Name</label>
                                <input type="text" name="father_mname" placeholder="Father's Middle Name" class="form-input" id="father_mname" required /> <!-- required -->
                                <span class="field-message">This field is required</span>
                            </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="input-group">
                                <label for="father_dob">Date of Birth</label>
                                <input type="date" name="father_dob" class="form-input" id="father_dob" required /> <!-- required -->
                                <span class="field-message">This field is required</span>
                            </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="input-group">
                                <label for="father_age">Age</label>
                                <input type="text" name="father_age" placeholder="Age" class="form-input" id="father_age" required /> <!-- required -->
                                <span class="field-message">This field is required</span>
                            </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="input-group">
                                <label for="father_contact">Mobile Number</label>
                                <input type="text" name="father_contact" placeholder="Mobile Number" class="form-input" id="father_contact" required /> <!-- required -->
                                <span class="field-message">This field is required</span>
                            </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="input-group">
                                <label for="father_occu">Occupation</label>
                                <input type="text" name="father_occu" placeholder="Occupation" class="form-input" id="father_occu" required /> <!-- required -->
                                <span class="field-message">This field is required</span>
                            </div>
                            </div>
                            
                            <div class='col-md-12'><hr></div>
                            <div class="col-md-4">
                                <div class="input-group">
                                <label for="mother_lname">Mother's Last Name</label>
                                <input type="text" name="mother_lname" placeholder="Mother's Last Name" class="form-input" id="mother_lname" required /> <!-- required -->
                                <span class="field-message">This field is required</span>
                            </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="input-group">
                                <label for="mother_fname">Mother's First Name</label>
                                <input type="text" name="mother_fname" placeholder="Mother's First Name" class="form-input" id="mother_fname" required /> <!-- required -->
                                <span class="field-message">This field is required</span>
                            </div>
                            </div>
                            
                            <div class="col-md-4">
                               <div class="input-group">
                                <label for="mother_mname">Mother's Middle Name</label>
                                <input type="text" name="mother_mname" placeholder="Mother's Middle Name" class="form-input" id="mother_mname" required /> <!-- required -->
                                <span class="field-message">This field is required</span>
                            </div> 
                            </div>
                            
                            <div class="col-md-4">
                                <div class="input-group">
                                <label for="mother_dob">Date of Birth</label>
                                <input type="date" name="mother_dob" class="form-input" id="mother_dob" required /> <!-- required -->
                                <span class="field-message">This field is required</span>
                            </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="input-group">
                                <label for="mother_age">Age</label>
                                <input type="text" name="mother_age" placeholder="Age" class="form-input" id="mother_age" required /> <!-- required -->
                                <span class="field-message">This field is required</span>
                            </div>
                            </div>

                            <div class="col-md-4">
                                <div class="input-group">
                                <label for="mother_contact">Mobile Number</label>
                                <input type="text" name="mother_contact" placeholder="Mobile Number" class="form-input" id="mother_contact" required /> <!-- required -->
                                <span class="field-message">This field is required</span>
                            </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="input-group">
                                <label for="mother_occu">Occupation</label>
                                <input type="text" name="mother_occu" placeholder="Occupation" class="form-input" id="mother_occu" required /> <!-- required -->
                                <span class="field-message">This field is required</span>
                            </div>
                            </div>
                            
                        </div>

                        <div class="tab-subhead mt-4">
                        <div><h6>If Married</h6><hr></div>
                        </div>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="input-group">
                                <label for="spouse_lname">Spouse's Last Name</label>
                                <input type="text" name="spouse_lname" placeholder="Spouse's Last Name" class="form-input" id="spouse_lname" />
                                <span class="field-message">This field is required</span>
                            </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="input-group">
                                <label for="spouse_fname">Spouse's First Name</label>
                                <input type="text" name="spouse_fname" placeholder="Spouse's First Name" class="form-input" id="spouse_fname" />
                                <span class="field-message">This field is required</span>
                            </div>
                            </div>

                            <div class="col-md-6">
                               <div class="input-group">
                                <label for="spouse_mname">Spouse's Middle Name</label>
                                <input type="text" name="spouse_mname" placeholder="Spouse's Middle Name" class="form-input" id="spouse_mname" />
                                <span class="field-message">This field is required</span>
                            </div> 
                            </div>

                            <div class="col-md-6">
                                <div class="input-group">
                                <label for="spouse_dob">Date of Birth</label>
                                <input type="date" name="spouse_dob" class="form-input" id="spouse_dob" />
                                <span class="field-message">This field is required</span>
                            </div>
                            </div>

                            <div class="col-md-6">
                                <div class="input-group">
                                <label for="spouse_age">Age</label>
                                <input type="number" name="spouse_age" placeholder="Age" class="form-input" id="spouse_age" />
                                <span class="field-message">This field is required</span>
                            </div>
                            </div>

                            <div class="col-md-6">
                                <div class="input-group">
                                <label for="spouse_contact">Mobile Number</label>
                                <input type="text" name="spouse_contact" placeholder="Mobile Number" class="form-input" id="spouse_contact" />
                                <span class="field-message">This field is required</span>
                            </div>
                            </div>

                            <div class="col-md-6">
                                <div class="input-group">
                                <label for="spouse_occu">Occupation</label>
                                <input type="text" name="spouse_occu" placeholder="Occupation" class="form-input" id="spouse_occu" />
                                <span class="field-message">This field is required</span>
                            </div>
                            </div>

                            <div class="col-md-6">
                                <div class="input-group">
                                <label for="spouse_emp_name">Name of Employer</label>
                                <input type="text" name="spouse_emp_name" placeholder="Name of Employer" class="form-input" id="spouse_emp_name" />
                                <span class="field-message">This field is required</span>
                            </div>
                            </div>

                            <div class="col-md-6">
                                <div class="input-group">
                                <label for="spouse_emp_stat">Employment Status</label>
                                <select name="spouse_emp_stat" id="spouse_emp_stat">
                                    <option value="">Status of Employment</option>
                                    <option value="Regular">Regular</option>
                                    <option value="Contractual">Contractual</option>
                                    <option value="Casual">Casual</option>
                                    <option value="Job Order">Job Order</option>
                                </select>
                            </div>
                            </div>

                            <div class="col-md-6">
                                <div class="input-group">
                                <label for="spouse_monthly_income">Monthly Income</label>
                                <input type="number" name="spouse_monthly_income" placeholder="Monthly Income" class="form-input" id="spouse_monthly_income" />
                                <span class="field-message">This field is required</span>
                            </div>
                            </div>

                            <div class="col-md-6">
                                <div class="input-group">
                                <label for="no_child">No. of Children Living With You</label>
                                <input type="number" name="no_child" placeholder="No. of Children Living With You" class="form-input" id="no_child" />
                                <span class="field-message">This field is required</span>
                            </div>
                            </div>

                            <div class="col-md-6">
                               <div class="input-group">
                                <label for="no_child_contrib">No. of Children Contributing to Household Income</label>
                                <input type="number" name="no_child_contrib" placeholder="No. of Children Contributing to Household Income" class="form-input" id="no_child_contrib" />
                                <span class="field-message">This field is required</span>
                            </div> 
                            </div>

                            <div class="col-md-6">
                               <div class="input-group">
                                <label for="total_monthly_contrib">Total Monthly Contribution</label>
                                <input type="number" name="total_monthly_contrib" placeholder="Total Monthly Contribution" class="form-input" id="total_monthly_contrib" />
                                <span class="field-message">This field is required</span>
                            </div> 
                            </div>

                            <div class="col-md-6">
                                <div class="input-group">
                                <label for="no_child_work">No. of Working Children</label>
                                <input type="number" name="no_child_work" placeholder="No. of Working Children" class="form-input" id="no_child_work" />
                                <span class="field-message">This field is required</span>
                            </div>
                            </div>

                            <div class="col-md-6">
                                <div class="input-group">
                                <label for="no_child_study">No. of NOT Studying Children</label>
                                <input type="number" name="no_child_study" placeholder="No. of NOT Studying Children" class="form-input" id="no_child_study" />
                                <span class="field-message">This field is required</span>
                            </div>
                            </div>

                            <div class="col-md-6">
                                <div class="input-group">
                                <label for="no_child_notstudy">No. of Studying Children</label>
                                <input type="number" name="no_child_notstudy" placeholder="No. of Studying Children" class="form-input" id="no_child_notstudy" />
                                <span class="field-message">This field is required</span>
                            </div>
                            </div>

                            <div class="col-md-6">
                                <div class="input-group">
                                <label for="house_yearly_income">HouseholdGross Yearly Income</label>
                                <select name="house_yearly_income" id="house_yearly_income">
                                    <option value="">Household Gross Monthly Salary</option>
                                    <option value="P150,000-P249,999">P150,000-P249,999</option>
                                    <option value="P250,000-P349,999">P250,000-P349,999</option>
                                    <option value="P350,000-P449,999">P350,000-P449,999</option>
                                    <option value="P450,000-P549,999">P450,000-P549,999</option>
                                    <option value="P550,000-P649,999">P550,000-P649,999</option>
                                    <option value="P650,000-P749,999">P650,000-P749,999</option>
                                    <option value="P750,000-P849,999">P750,000-P849,999</option>
                                    <option value="P850,000-P949,999">P850,000-P949,999</option>
                                    <option value="P950,000-P1,299,999">P950,000-P1,299,999</option>
                                    <option value="P1,300,000-P1,499,999">P1,300,000-P1,499,999</option>
                                    <option value="P1,500,000-P1,999,999">P1,500,000-P1,999,999</option>
                                    <option value="P2,000,000-P2,499,999">P2,000,000-P2,499,999</option>
                                    <option value="P2,500,000-P2,999,999">P2,500,000-P2,999,999</option>
                                    <option value="P3,000,000-P3,499,999">P3,000,000-P3,499,999</option>
                                    <option value="Above P3,000,000">Above P3,000,000</option>
                                </select>
                            </div>
                            </div>
                        </div>

                        <div class="tab-subhead mt-4">
                        <div><h6>In Case of Emergency</h6><hr></div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-group">
                                <label for="emer_name">Name of Person/s To Be Notified</label>
                                <input type="text" name="emer_name" placeholder="Name of Person/s To Be Notified" class="form-input" id="emer_name" required />
                                <span class="field-message">This field is required</span>
                            </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="input-group">
                                <label for="emer_contact">Contact Number</label>
                                <input type="text" name="emer_contact" placeholder="Contact Number" class="form-input" id="emer_contact" required />
                                <span class="field-message">This field is required</span>
                            </div>
                            </div>

                            <div class="col-md-6">
                                <div class="input-group">
                                <label for="emer_address">Address</label>
                                <input type="text" name="emer_address" placeholder="Address" class="form-input" id="emer_address" required />
                                <span class="field-message">This field is required</span>
                            </div>
                            </div>

                            
                        </div>

                        <div class="btns-group">
                            <a href="#" class="btn-prev"><i class='bx bx-chevron-left'></i>Back</a>
                            <button type="button" class="btn btn-next btn-primary">Next</button>
                        </div>
                    </div>

                    <!-- Beneficiaries -->
                    <div class="tabpanel ">
                        <div class="tab-header">
                            <h3>Beneficiaries</h3>
                        </div>
                        <div class="tab-subhead mt-4">
                            <div><h6>Beneficiary 1</h6><hr></div>
                        </div>
                        <div class="row g-3">
                            <div class="col-md">
                                <div class="input-group">
                                <label for="beneficiaries[0][ben_lname]">Last Name</label>
                                <input type="text" name="beneficiaries[0][ben_lname]" placeholder="Last Name" class="form-input" id="beneficiaries[0][ben_lname]" />
                                <span class="field-message">This field is required</span>
                            </div>
                            </div>
                            
                            <div class="col-md">
                                <div class="input-group">
                                <label for="beneficiaries[0][ben_fname]">First Name</label>
                                <input type="text" name="beneficiaries[0][ben_fname]" placeholder="First Name" class="form-input" id="beneficiaries[0][ben_fname]" />
                                <span class="field-message">This field is required</span>
                            </div>
                            </div>

                            <div class="col-md">
                                <div class="input-group">
                                <label for="beneficiaries[0][ben_mname]">Middle Name</label>
                                <input type="text" name="beneficiaries[0][ben_mname]" placeholder="Middle Name" class="form-input" id="beneficiaries[0][ben_mname]" />
                                <span class="field-message">This field is required</span>
                            </div>
                            </div>

                            <div class="col-md">
                                <div class="input-group">
                                <label for="beneficiaries[0][ben_suffix]">Suffix</label>
                                <input type="text" name="beneficiaries[0][ben_suffix]" placeholder="Suffix" class="form-input" id="beneficiaries[0][ben_suffix]" />
                                <span class="field-message">This field is required</span>
                            </div>
                            </div>

                            <div class="col-md-6">
                                <div class="input-group">
                                <label for="beneficiaries[0][ben_dob]">Date of Birth</label>
                                <input type="date" name="beneficiaries[0][ben_dob]" placeholder="Date of Birth" class="form-input" id="beneficiaries[0][ben_dob]" />
                                <span class="field-message">This field is required</span>
                            </div>
                            </div>

                            <div class="col-md-6">
                                <div class="input-group">
                                <label for="beneficiaries[0][ben_relationship]">Relationship</label>
                                <input type="text" name="beneficiaries[0][ben_relationship]" placeholder="Relationship" class="form-input" id="beneficiaries[0][ben_relationship]" />
                                <span class="field-message">This field is required</span>
                            </div>
                            </div>
                            
                        </div>

                        <div class="tab-subhead mt-4">
                            <div><h6>Beneficiary 2</h6><hr></div>
                        </div>
                        <div class="row g-3">
                            <div class="col-md">
                               <div class="input-group">
                                <label for="beneficiaries[1][ben_lname]">Last Name</label>
                                <input type="text" name="beneficiaries[1][ben_lname]" placeholder="Last Name" class="form-input" id="beneficiaries[1][ben_lname]" />
                                <span class="field-message">This field is required</span>
                            </div> 
                            </div>
                            
                            <div class="col-md">
                                <div class="input-group">
                                <label for="beneficiaries[1][ben_fname]">First Name</label>
                                <input type="text" name="beneficiaries[1][ben_fname]" placeholder="First Name" class="form-input" id="beneficiaries[1][ben_fname]" />
                                <span class="field-message">This field is required</span>
                            </div>
                            </div>

                            <div class="col-md">
                                <div class="input-group">
                                <label for="beneficiaries[1][ben_mname]">Middle Name</label>
                                <input type="text" name="beneficiaries[1][ben_mname]" placeholder="Middle Name" class="form-input" id="beneficiaries[1][ben_mname]" />
                                <span class="field-message">This field is required</span>
                            </div>
                            </div>

                            <div class="col-md">
                                <div class="input-group">
                                <label for="beneficiaries[1][ben_suffix]">Suffix</label>
                                <input type="text" name="beneficiaries[1][ben_suffix]" placeholder="Suffix" class="form-input" id="beneficiaries[1][ben_suffix]" />
                                <span class="field-message">This field is required</span>
                            </div>
                            </div>

                            <div class="col-md-6">
                                <div class="input-group">
                                <label for="beneficiaries[1][ben_dob]">Date of Birth</label>
                                <input type="date" name="beneficiaries[1][ben_dob]" placeholder="Date of Birth" class="form-input" id="beneficiaries[1][ben_dob]" />
                                <span class="field-message">This field is required</span>
                            </div>
                            </div>

                            <div class="col-md-6">
                                <div class="input-group">
                                <label for="beneficiaries[1][ben_relationship]">Relationship</label>
                                <input type="text" name="beneficiaries[1][ben_relationship]" placeholder="Relationship" class="form-input" id="beneficiaries[1][ben_relationship]" />
                                <span class="field-message">This field is required</span>
                            </div>
                            </div>
                            
                        </div>

                        <div class="tab-subhead mt-4">
                        <div><h6>Beneficiary 3</h6><hr></div>
                        </div>
                        <div class="row g-3">
                            <div class="col-md">
                                <div class="input-group">
                                <label for="beneficiaries[2][ben_lname]">Last Name</label>
                                <input type="text" name="beneficiaries[2][ben_lname]" placeholder="Last Name" class="form-input" id="beneficiaries[2][ben_lname]" />
                                <span class="field-message">This field is required</span>
                            </div>
                            </div>
                            
                            <div class="col-md">
                                <div class="input-group">
                                <label for="beneficiaries[2][ben_fname]">First Name</label>
                                <input type="text" name="beneficiaries[2][ben_fname]" placeholder="First Name" class="form-input" id="beneficiaries[2][ben_fname]" />
                                <span class="field-message">This field is required</span>
                            </div>
                            </div>

                            <div class="col-md">
                                <div class="input-group">
                                <label for="beneficiaries[2][ben_mname]">Middle Name</label>
                                <input type="text" name="beneficiaries[2][ben_mname]" placeholder="Middle Name" class="form-input" id="beneficiaries[2][ben_mname]" />
                                <span class="field-message">This field is required</span>
                            </div>
                            </div>

                            <div class="col-md">
                                <div class="input-group">
                                <label for="beneficiaries[2][ben_suffix]">Suffix</label>
                                <input type="text" name="beneficiaries[2][ben_suffix]" placeholder="Suffix" class="form-input" id="beneficiaries[2][ben_suffix]" />
                                <span class="field-message">This field is required</span>
                            </div>
                            </div>

                            <div class="col-md-6">
                                <div class="input-group">
                                <label for="beneficiaries[2][ben_dob]">Date of Birth</label>
                                <input type="date" name="beneficiaries[2][ben_dob]" placeholder="Date of Birth" class="form-input" id="beneficiaries[2][ben_dob]" />
                                <span class="field-message">This field is required</span>
                            </div>
                            </div>

                            <div class="col-md-6">
                                <div class="input-group">
                                <label for="beneficiaries[2][ben_relationship]">Relationship</label>
                                <input type="text" name="beneficiaries[2][ben_relationship]" placeholder="Relationship" class="form-input" id="beneficiaries[2][ben_relationship]" />
                                <span class="field-message">This field is required</span>
                            </div>
                            </div>

                            
                        </div>

                        <div class="tab-subhead mt-3">
                        <div><h6>Beneficiary 4</h6><hr></div>
                        </div>
                        <div class="row g-3">

                            <div class="col-md">
                                <div class="input-group">
                                <label for="beneficiaries[3][ben_lname]">Last Name</label>
                                <input type="text" name="beneficiaries[3][ben_lname]" placeholder="Last Name" class="form-input" id="beneficiaries[3][ben_lname]" />
                                <span class="field-message">This field is required</span>
                            </div>
                            </div>

                            <div class="col-md">
                                <div class="input-group">
                                <label for="beneficiaries[3][ben_fname]">First Name</label>
                                <input type="text" name="beneficiaries[3][ben_fname]" placeholder="First Name" class="form-input" id="beneficiaries[3][ben_fname]" />
                                <span class="field-message">This field is required</span>
                            </div>
                            </div>
                            
                            <div class="col-md">
                                <div class="input-group">
                                <label for="beneficiaries[3][ben_mname]">Middle Name</label>
                                <input type="text" name="beneficiaries[3][ben_mname]" placeholder="Middle Name" class="form-input" id="beneficiaries[3][ben_mname]" />
                                <span class="field-message">This field is required</span>
                            </div>
                            </div>

                            <div class="col-md">
                                <div class="input-group">
                                <label for="beneficiaries[3][ben_suffix]">Suffix</label>
                                <input type="text" name="beneficiaries[3][ben_suffix]" placeholder="Suffix" class="form-input" id="beneficiaries[3][ben_suffix]" />
                                <span class="field-message">This field is required</span>
                            </div>
                            </div>

                            <div class="col-md-6">
                                <div class="input-group">
                                <label for="beneficiaries[3][ben_dob]">Date of Birth</label>
                                <input type="date" name="beneficiaries[3][ben_dob]" placeholder="Date of Birth" class="form-input" id="beneficiaries[3][ben_dob]" />
                                <span class="field-message">This field is required</span>
                            </div>
                            </div>

                            <div class="col-md-6">
                                <div class="input-group">
                                <label for="beneficiaries[3][ben_relationship]">Relationship</label>
                                <input type="text" name="beneficiaries[3][ben_relationship]" placeholder="Relationship" class="form-input" id="beneficiaries[3][ben_relationship]" />
                                <span class="field-message">This field is required</span>
                            </div>
                            </div>
                        </div>

                        <div class="tab-subhead mt-4">
                        <div><h6>Beneficiary 5</h6><hr></div>
                        </div>
                        <div class="row g-3">
                            <div class="col-md">
                                <div class="input-group">
                                <label for="beneficiaries[4][ben_lname]">Last Name</label>
                                <input type="text" name="beneficiaries[4][ben_lname]" placeholder="Last Name" class="form-input" id="beneficiaries[4][ben_lname]" />
                                <span class="field-message">This field is required</span>
                            </div>
                            </div>

                            <div class="col-md">
                                <div class="input-group">
                                <label for="beneficiaries[4][ben_fname]">First Name</label>
                                <input type="text" name="beneficiaries[4][ben_fname]" placeholder="First Name" class="form-input" id="beneficiaries[4][ben_fname]" />
                                <span class="field-message">This field is required</span>
                            </div>
                            </div>

                            <div class="col-md">
                                <div class="input-group">
                                <label for="beneficiaries[4][ben_mname]">Middle Name</label>
                                <input type="text" name="beneficiaries[4][ben_mname]" placeholder="Middle Name" class="form-input" id="beneficiaries[4][ben_mname]" />
                                <span class="field-message">This field is required</span>
                            </div>
                            </div>

                            <div class="col-md">
                                <div class="input-group">
                                <label for="beneficiaries[4][ben_suffix]">Suffix</label>
                                <input type="text" name="beneficiaries[4][ben_suffix]" placeholder="Suffix" class="form-input" id="beneficiaries[4][ben_suffix]" />
                                <span class="field-message">This field is required</span>
                            </div>
                            </div>

                            <div class="col-md-6">
                                <div class="input-group">
                                <label for="beneficiaries[4][ben_dob]">Date of Birth</label>
                                <input type="date" name="beneficiaries[4][ben_dob]" placeholder="Date of Birth" class="form-input" id="beneficiaries[4][ben_dob]" />
                                <span class="field-message">This field is required</span>
                            </div>
                            </div>

                            <div class="col-md-6">
                                <div class="input-group">
                                <label for="beneficiaries[4][ben_relationship]">Relationship</label>
                                <input type="text" name="beneficiaries[4][ben_relationship]" placeholder="Relationship" class="form-input" id="beneficiaries[4][ben_relationship]" />
                                <span class="field-message">This field is required</span>
                            </div>
                            </div>

                            
                        </div>

                        <div class="tab-subhead mt-4">
                        <div><h6>Beneficiary 6</h6><hr></div>
                        </div>
                        <div class="row g-3">
                            <div class="col-md">
                                <div class="input-group">
                                <label for="beneficiaries[5][ben_lname]">Last Name</label>
                                <input type="text" name="beneficiaries[5][ben_lname]" placeholder="Last Name" class="form-input" id="beneficiaries[5][ben_lname]" />
                                <span class="field-message">This field is required</span>
                            </div>
                            </div>

                            <div class="col-md">
                                <div class="input-group">
                                <label for="beneficiaries[5][ben_fname]">First Name</label>
                                <input type="text" name="beneficiaries[5][ben_fname]" placeholder="First Name" class="form-input" id="beneficiaries[5][ben_fname]" />
                                <span class="field-message">This field is required</span>
                            </div>
                            </div>
                            
                            <div class="col-md">
                                <div class="input-group">
                                <label for="beneficiaries[5][ben_mname]">Middle Name</label>
                                <input type="text" name="beneficiaries[5][ben_mname]" placeholder="Middle Name" class="form-input" id="beneficiaries[5][ben_mname]" />
                                <span class="field-message">This field is required</span>
                            </div>
                            </div>
                            
                            <div class="col-md">
                                <div class="input-group">
                                <label for="beneficiaries[5][ben_suffix]">Suffix</label>
                                <input type="text" name="beneficiaries[5][ben_suffix]" placeholder="Suffix" class="form-input" id="beneficiaries[5][ben_suffix]" />
                                <span class="field-message">This field is required</span>
                            </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="input-group">
                                <label for="beneficiaries[5][ben_dob]">Date of Birth</label>
                                <input type="date" name="beneficiaries[5][ben_dob]" placeholder="Date of Birth" class="form-input" id="beneficiaries[5][ben_dob]" />
                                <span class="field-message">This field is required</span>
                            </div>
                            </div>

                            <div class="col-md-6">
                                <div class="input-group">
                                <label for="beneficiaries[5][ben_relationship]">Relationship</label>
                                <input type="text" name="beneficiaries[5][ben_relationship]" placeholder="Relationship" class="form-input" id="beneficiaries[5][ben_relationship]" />
                                <span class="field-message">This field is required</span>
                            </div>
                            </div>
                            
                        </div>

                        <div class="btns-group">
                            <a href="#" class="btn-prev"><i class='bx bx-chevron-left'></i>Back</a>
                            <button type="button" class="btn btn-next btn-primary">Next</button>
                        </div>
                    </div>

                    <div class="tabpanel">

                        <div class="tab-header">
                            <h3>Declaration and Specimen Signature</h3>
                        </div>
                        <div class="tab-content">
                            <p>1. I, whose specimen signature appears below, confirm that all the information disclosed in this membership
                                application form is correct and complete. Any changes in the foregoing information shall be communicated to
                                Cooperative. I hereby authorize the Cooperative to verify and investigate any and all the information given
                                by me which the Coop may deem appropriate.
                            </p><br>
                            <p>2. I hereby acknowledge and authorize the Cooperative:</p><br>
                            <p>1. the regular submission and disclosure of my basic credit data (as defined by Republic Act No. 9510 and investigate
                                implementing Rules and Regulation) to the Credit Information Corporation (CIC) as well as any updates or corrections
                                thereof;</p><br>
                            <p>2. the sharing of my basic credit data with other lenders authorized by the CIC, and credit reporting agencies duly
                                accredited by the CIC.
                            </p>

                            <div class="col-md-9">
                                <div class="input-group">
                                    <label for="e_signature">Signature</label>
                                    <input type="file" name="e_signature" class="form-input" id="e_signature" required />
                                    <span class="field-message">This field is required</span>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="input-group">
                                    <label for="app_date">Date</label>
                                    <input type="date" name="app_date" class="form-input" id="app_date" required />
                                    <span class="field-message">This field is required</span>
                                </div>
                            </div>

                            <div class="btns-group">
                                <a href="#" class="btn-prev"><i class='bx bx-chevron-left'></i>Back</a>
                                <button class="btn btn-next">Submit</button>
                            </div>


                        </div>

                    </div>
            </div>

            </form>
        </div>
        </div>
    </main>
</body>
<!-- <script src="{{ asset('/assets/premembershipform/js/premembership.js'); }}"></script> -->

<!-- Bootdrap CDN -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    
<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="<?php echo url('theme'); ?>/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?php echo url('theme'); ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo url('theme'); ?>/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo url('theme'); ?>/dist/js/adminlte.js"></script>


<script src="{{ asset('/assets/membershipapplication/js/membership.js'); }}"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    function updateSubTypeOptions() {
        console.log("updateSubTypeOptions function called");

        var empTypeSelect = $("#emp_type");
        var empSubTypeSelect = $("#emp_others");

        // Clear existing options
        empSubTypeSelect.empty().append('<option value="">Employment Sub-Type</option>');

        // Get the selected value from the first dropdown
        var selectedEmpType = empTypeSelect.val();

        if (selectedEmpType === "Office Worker" ||
            selectedEmpType === "Skilled Worker" ||
            selectedEmpType === "Laborer/Helper" ||
            selectedEmpType === "Church Worker/Servant" ||
            selectedEmpType === "Self-Employed (Professional)" ||
            selectedEmpType === "Self-Employed (Non-Professional)" ||
            selectedEmpType === "Farmer") {
            $("#empSubTypeInputContainer").show();
            $("#typeOtherInputContainer").hide();
            $("#businessInputContainer").hide();
            $("#assetSizeInputContainer").hide();
        } else if (selectedEmpType === "Business Owner") {
            $("#businessInputContainer").show();
            $("#assetSizeInputContainer").show();
            $("#typeOtherInputContainer").hide();
            $("#empSubTypeInputContainer").hide();
        } else if (selectedEmpType === "Others") {
            $("#typeOtherInputContainer").show();
            $("#businessInputContainer").hide();
            $("#assetSizeInputContainer").hide();
            $("#empSubTypeInputContainer").hide();
        } else if (selectedEmpType === "Overseas Filipino Worker (OFW)" ||
            selectedEmpType === "Home Based (Online Job)" ||
            selectedEmpType === "Fisher Folk" ||
            selectedEmpType === "Indigenous People" ||
            selectedEmpType === "Housewife" ||
            selectedEmpType === "Person With Reduced Mobility (PRM)" ||
            selectedEmpType === "Retiree" ||
            selectedEmpType === "Pensioner" ||
            selectedEmpType === "Rebel Returnees" ||
            selectedEmpType === "Youth/Student") {
            $("#typeOtherInputContainer").hide();
            $("#businessInputContainer").hide();
            $("#assetSizeInputContainer").hide();
            $("#empSubTypeInputContainer").hide();
        }

        // Make an AJAX request to get the options for the second dropdown
        $.get('{{ route("members.get-sub-type-options") }}', {
            emp_type: selectedEmpType
        }, function(data) {
            console.log("AJAX request successful");

            // Add new options to the second dropdown
            $.each(data.options, function(index, option) {
                empSubTypeSelect.append('<option value="' + option + '">' + option + '</option>');
            });

            // Enable or disable the second dropdown based on whether options are available
            empSubTypeSelect.prop("disabled", data.options.length === 0);
        }).fail(function() {
            console.log("AJAX request failed");
        });
    }
</script>


</html>