<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member / Create</title>
</head>
<body>
@extends('layouts.app')

    @section('content')

    <!-- Content Header (Page header) -->
<section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create Member</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('members.index') }}">Members</a></li>
                        <li class="breadcrumb-item active">Create</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">

                    <div class="card-body">
                        <form id="memberForm" method="POST" action="{{ route('members.store') }}" enctype="multipart/form-data">
                            @csrf

                            <!-- Section 1: Personal Info -->
                            <div id="section1">
                                <div class="card-header bg-dark text-white">
                                    <h7 class="mb-0">{{ __('Personal Information') }}</h7>
                                </div><br>

                                <div class="form-group">
                                    <label for="lname">{{ __('Last Name') }}</label>
                                    <input id="lname" type="text" class="form-control" name="lname" required autofocus>
                                </div>

                                <div class="form-group">
                                    <label for="mname">{{ __('Middle Name') }}</label>
                                    <input id="mname" type="text" class="form-control" name="mname" required>
                                </div>

                                <div class="form-group">
                                    <label for="fname">{{ __('First Name') }}</label>
                                    <input id="fname" type="text" class="form-control" name="fname" required>
                                </div>

                                <div class="form-group">
                                    <label for="suffix">{{ __('Suffix') }}</label>
                                    <input id="suffix" type="text" class="form-control" name="suffix">
                                </div>

                                <div class="form-group">
                                    <label for="sex">{{ __('Sex') }}</label>
                                    <select id="sex" class="form-control" name="sex">
                                        <option value="" disabled selected>Select Sex</option>
                                        <option value="male">{{ __('Male') }}</option>
                                        <option value="female">{{ __('Female') }}</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="civil_status">{{ __('Civil Status') }}</label>
                                    <select id="civil_status" class="form-control" name="civil_status">
                                        <option value="" disabled selected>Select Civil Status</option>
                                        <option value="single">{{ __('Single') }}</option>
                                        <option value="married">{{ __('Married') }}</option>
                                        <option value="widow">{{ __('Widow') }}</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="dob">{{ __('Date of Birth') }}</label>
                                    <input id="dob" type="date" class="form-control" name="dob">
                                </div>

                                <div class="form-group">
                                    <label for="age">{{ __('Age') }}</label>
                                    <input id="age" type="number" class="form-control" name="age">
                                </div>

                                <div class="form-group">
                                    <label for="tel_no">{{ __('Telephone Number') }}</label>
                                    <input id="tel_no" type="tel" class="form-control" name="tel_no">
                                </div>

                                <div class="form-group">
                                    <label for="mobile_no">{{ __('Mobile Number') }}</label>
                                    <input id="mobile_no" type="tel" class="form-control" name="mobile_no">
                                </div>

                                <div class="form-group">
                                    <label for="religion">{{ __('Religion') }}</label>
                                    <input id="religion" type="text" class="form-control" name="religion">
                                </div>

                                <div class="form-group">
                                    <label for="email">{{ __('Email') }}</label>
                                    <input id="email" type="email" class="form-control" name="email">
                                </div>

                                <div class="form-group">
                                    <label for="place_birth">{{ __('Place of Birth') }}</label>
                                    <input id="place_birth" type="text" class="form-control" name="place_birth">
                                </div>

                                <div class="form-group">
                                    <label for="present_address">{{ __('Present Address') }}</label>
                                    <input id="present_address" type="text" class="form-control" name="present_address">
                                </div>

                                <div class="form-group">
                                    <label for="duration_residency">{{ __('Duration of Residency (years and months)') }}</label>
                                    <input id="duration_residency" type="text" class="form-control" name="duration_residency">
                                </div>

                                <div class="form-group">
                                    <label for="living_parents">{{ __('Living with Parents?') }}</label>
                                    <select id="living_parents" class="form-control" name="living_parents">
                                        <option value="" disabled selected>Select Answer</option>
                                        <option value="Yes">{{ __('Yes') }}</option>
                                        <option value="No">{{ __('No') }}</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="house">{{ __('House') }}</label>
                                    <select id="house" class="form-control" name="house">
                                        <option value="" disabled selected>Select House</option>
                                        <option value="own">{{ __('Own') }}</option>
                                        <option value="rent">{{ __('Rent') }}</option>
                                        <option value="mortgage">{{ __('Mortgage') }}</option>
                                    </select>
                                </div>

                                <div class="form-group" id="houseMonthField">
                                    <label for="house_month">{{ __('House Monthly') }}</label>
                                    <input id="house_month" type="text" class="form-control" name="house_month">
                                </div>

                                <div class="form-group">
                                    <label for="lot">{{ __('Lot') }}</label>
                                    <select id="lot" class="form-control" name="lot">
                                        <option value="" disabled selected>Select Lot</option>
                                        <option value="own">{{ __('Own') }}</option>
                                        <option value="rent">{{ __('Rent') }}</option>
                                        <option value="mortgage">{{ __('Mortgage') }}</option>
                                    </select>
                                </div>

                                <div class="form-group" id="lotMonthField">
                                    <label for="lot_month">{{ __('Lot Monthly') }}</label>
                                    <input id="lot_month" type="text" class="form-control" name="lot_month">
                                </div>

                                <div class="form-group">
                                    <label for="tin">{{ __('TIN') }}</label>
                                    <input id="tin" type="number" class="form-control" name="tin">
                                </div>

                                <div class="form-group">
                                    <label for="educational_attainment">{{ __('Educational Attainment') }}</label>
                                    <select id="educational_attainment" class="form-control" name="educational_attainment">
                                        <option value="" disabled selected>Select Educational Attainment</option>
                                        <option value="elementary_level">{{ __('Elementary Level') }}</option>
                                        <option value="elementary_graduate">{{ __('Elementary Graduate') }}</option>
                                        <option value="high_school_level">{{ __('High School Level') }}</option>
                                        <option value="high_school_graduate">{{ __('High School Graduate') }}</option>
                                        <option value="college_level">{{ __('College Level') }}</option>
                                        <option value="college_graduate">{{ __('College Graduate') }}</option>
                                        <option value="graduate">{{ __('Graduate') }}</option>
                                        <option value="post_graduate">{{ __('Post-Graduate') }}</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Section 2: Employment -->
                            <div id="section2" style="display: none;">
                                <div class="card-header bg-dark text-white">
                                    <h7 class="mb-0">{{ __('Employment/Occupation/Business Data') }}</h7>
                                </div><br>

                                <div class="form-group">
                                    <label for="emp_stat">{{ __('Employment Status (choose one)') }}</label>
                                    <select id="emp_stat" class="form-control" name="emp_stat">
                                        <option value="" disabled selected>Select Employment Status</option>
                                        <option value="private_employee">{{ __('Private Employee') }}</option>
                                        <option value="government_employee">{{ __('Government Employee') }}</option>
                                        <option value="office_worker">{{ __('Office Worker') }}</option>
                                        <option value="skilled_worker">{{ __('Skilled Worker') }}</option>
                                        <option value="ofw">{{ __('Overseas Filipino Worker (OFW)') }}</option>
                                        <option value="laborer_helper">{{ __('Laborer/Helper') }}</option>
                                        <option value="church_worker">{{ __('Church Worker/Servant') }}</option>
                                        <option value="home_based">{{ __('Home Based') }}</option>
                                        <option value="self_employed_professional">{{ __('Self-Employed (Professional)') }}</option>
                                        <option value="self_employed_nonprofessional">{{ __('Self-Employed (Non-Professional)') }}</option>
                                        <option value="business_owner">{{ __('Business Owner') }}</option>
                                        <option value="farmer">{{ __('Farmer') }}</option>
                                        <option value="fisher_folk">{{ __('Fisher Folk') }}</option>
                                        <option value="indigenous_people">{{ __('Indigenous People') }}</option>
                                        <option value="house_wife">{{ __('House Wife') }}</option>
                                        <option value="person_with_reduced_mobility">{{ __('Person with Reduced Mobility (PRM)') }}</option>
                                        <option value="retiree">{{ __('Retiree') }}</option>
                                        <option value="pensioner">{{ __('Pensioner') }}</option>
                                        <option value="rebel_returnees">{{ __('Rebel Returnees') }}</option>
                                        <option value="youth_student">{{ __('Youth/Student') }}</option>
                                    </select>
                                </div>

                                
                                <div class="form-group">
                                    <!-- <label for="emp_type">{{ __('Employment Type') }}</label> -->
                                    <select id="emp_type" class="form-control" name="emp_type">
                                        <option value="" disabled selected>Select Employment Role/Position</option>
                                        <option value="regular">{{ __('Regular') }}</option>
                                        <option value="contractual">{{ __('Contractual') }}</option>
                                        <option value="casual">{{ __('Casual') }}</option>
                                        <option value="job_order">{{ __('Job Order') }}</option>
                                        <option value="administrator">{{ __('Administrator') }}</option>
                                        <option value="executive_officer">{{ __('Executive Officer') }}</option>
                                        <option value="manager">{{ __('Manager') }}</option>
                                        <option value="clerical_staff">{{ __('Clerical Staff') }}</option>
                                        <option value="sales_marketing_staff">{{ __('Sales/Marketing Staff') }}</option>
                                        <option value="maintenance_personnel">{{ __('Maintenance Personnel') }}</option>
                                        <option value="carpenter">{{ __('Carpenter') }}</option>
                                        <option value="driver">{{ __('Driver') }}</option>
                                        <option value="mason">{{ __('Mason') }}</option>
                                        <option value="tailor">{{ __('Tailor') }}</option>
                                        <option value="construction">{{ __('Construction') }}</option>
                                        <option value="nanny">{{ __('Nanny') }}</option>
                                        <option value="volunteer">{{ __('Volunteer') }}</option>
                                        <option value="part_time">{{ __('Part-time') }}</option>
                                        <option value="full_time">{{ __('Full-time') }}</option>
                                        <option value="casual_church">{{ __('Casual') }}</option>
                                        <option value="permanent">{{ __('Permanent') }}</option>
                                        <option value="doctor">{{ __('Doctor') }}</option>
                                        <option value="architect">{{ __('Architect') }}</option>
                                        <option value="accountant">{{ __('Accountant') }}</option>
                                        <option value="engineer">{{ __('Engineer') }}</option>
                                        <option value="vendor">{{ __('Vendor') }}</option>
                                        <option value="appliances_repairer">{{ __('Appliances Repairer') }}</option>
                                        <option value="shoemaker">{{ __('Shoemaker') }}</option>
                                        <option value="cellphone_repairer">{{ __('Cellphone Repairer') }}</option>
                                    </select>
                                </div>

                                <!-- Business Type field -->
                                <div class="form-group">
                                    <label for="business_type">{{ __('Business Type') }}</label>
                                    <input id="business_type" type="text" class="form-control" name="business_type">
                                </div>

                                <!-- Asset Size field -->
                                <div class="form-group" >
                                    <label for="asset_size">{{ __('Asset Size') }}</label>
                                    <select id="asset_size" class="form-control" name="asset_size">
                                        <option value="" disabled selected>Select Asset Size</option>
                                        <option value="below_100000">Below PHP 100,000.00</option>
                                        <option value="100000_1000000">PHP 100,000.00 - PHP 1,000,000.00</option>
                                        <option value="1000000_5000000">PHP 1,000,000.00 - PHP 5,000,000.00</option>
                                        <option value="5000000_10000000">PHP 5,000,000.00 - PHP 10,000,000.00</option>
                                        <option value="above_10000001">Above PHP 10,000,001.00</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="profession">{{ __('Profession') }}</label>
                                    <input id="profession" type="text" class="form-control" name="profession">
                                </div>

                                <div class="form-group">
                                    <label for="emp_others">{{ __('Others (please specify)') }}</label>
                                    <input id="emp_others" type="text" class="form-control" name="emp_others">
                                </div>
                            </div>

                            <!-- Section 3: Employed Information -->
                            <div id="section3" style="display: none;">
                                <div class="card-header bg-dark text-white">
                                    <h7 class="mb-0">{{ __('For Employed') }}</h7>
                                </div><br>

                                <div class="form-group">
                                    <label for="employer_name">{{ __('Employer Name') }}</label>
                                    <input id="employer_name" type="text" class="form-control" name="employer_name">
                                </div>

                                <div class="form-group">
                                    <label for="service_length">{{ __('Service Length') }}</label>
                                    <input id="service_length" type="text" class="form-control" name="service_length">
                                </div>

                                <div class="form-group">
                                    <label for="employer_status">{{ __('Status of Employment') }}</label>
                                    <select id="employer_status" class="form-control" name="employer_status">
                                        <option value="" disabled selected>Select Employer Status</option>
                                        <option value="regular">{{ __('Regular') }}</option>
                                        <option value="contractual">{{ __('Contractual') }}</option>
                                        <option value="casual">{{ __('Casual') }}</option>
                                        <option value="job_order">{{ __('Job Order') }}</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="employer_address">{{ __('Employer Address') }}</label>
                                    <input id="employer_address" type="text" class="form-control" name="employer_address">
                                </div>

                                <div class="form-group">
                                    <label for="employer_contact">{{ __('Employer Contact') }}</label>
                                    <input id="employer_contact" type="tel" class="form-control" name="employer_contact">
                                </div>

                                <div class="form-group">
                                    <label for="monthly_salary">{{ __('Monthly Salary') }}</label>
                                    <select id="monthly_salary" class="form-control" name="monthly_salary">
                                        <option value="" disabled selected>Select Monthly Salary</option>
                                        <option value="below_10000">Below PHP 10,000</option>
                                        <option value="10000_19999">PHP 10,000 - PHP 19,999</option>
                                        <option value="20000_49999">PHP 20,000 - PHP 49,999</option>
                                        <option value="50000_99999">PHP 50,000 - PHP 99,999</option>
                                        <option value="above_100000">Above PHP 100,000</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Section 4: For those who have existing business-->
                            <div id="section4" style="display: none;">
                                <div class="card-header bg-dark text-white">
                                    <h7 class="mb-0">{{ __('For those who have existing business') }}</h7>
                                </div><br>
                               
                                <div class="form-group">
                                    <label for="business_name">{{ __('Business Name') }}</label>
                                    <input id="business_name" type="text" class="form-control" name="business_name">
                                </div>

                                <div class="form-group">
                                    <label for="business_tin">{{ __('Business TIN') }}</label>
                                    <input id="business_tin" type="number" class="form-control" name="business_tin">
                                </div>

                                <div class="form-group">
                                    <label for="business_address">{{ __('Business Address') }}</label>
                                    <input id="business_address" type="text" class="form-control" name="business_address">
                                </div>

                                <div class="form-group">
                                    <label for="business_contact">{{ __('Business Contact') }}</label>
                                    <input id="business_contact" type="tel" class="form-control" name="business_contact">
                                </div>

                                <div class="form-group">
                                    <label for="op_duration_year">{{ __('Duration of Operation (Years)') }}</label>
                                    <input id="op_duration_year" type="number" class="form-control" name="op_duration_year">
                                </div>

                                <div class="form-group">
                                    <label for="op_duration_month">{{ __('Duration of Operation (Months)') }}</label>
                                    <input id="op_duration_month" type="number" class="form-control" name="op_duration_month">
                                </div>

                                <div class="form-group">
                                    <label for="no_workers">{{ __('Number of Workers') }}</label>
                                    <input id="no_workers" type="number" class="form-control" name="no_workers">
                                </div>

                                <div class="form-group">
                                    <label for="yearly_income">{{ __('Annual Income') }}</label>
                                    <select id="yearly_income" class="form-control" name="yearly_income">
                                        <option value="" disabled selected>Select Annual Income</option>
                                        <option value="below_50000">Below ₱50,000</option>
                                        <option value="50000_149999">₱50,000 - ₱149,999</option>
                                        <option value="150000_249999">₱150,000 - ₱249,999</option>
                                        <option value="250000_349999">₱250,000 - ₱349,999</option>
                                        <option value="350000_449999">₱350,000 - ₱449,999</option>
                                        <option value="450000_549999">₱450,000 - ₱549,999</option>
                                        <option value="550000_649999">₱550,000 - ₱649,999</option>
                                        <option value="650000_749999">₱650,000 - ₱749,999</option>
                                        <option value="750000_849999">₱750,000 - ₱849,999</option>
                                        <option value="850000_949999">₱850,000 - ₱949,999</option>
                                        <option value="950000_1299999">₱950,000 - ₱1,299,999</option>
                                        <option value="1300000_1499999">₱1,300,000 - ₱1,499,999</option>
                                        <option value="1500000_1799999">₱1,500,000 - ₱1,799,999</option>
                                        <option value="1800000_2000000">₱1,800,000 - ₱2,000,000</option>
                                        <option value="above_2000000">Above ₱2,000,000</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="source_income">{{ __('Source of Income') }}</label>
                                    <select id="source_income" class="form-control" name="source_income">
                                        <option value="" disabled selected>Select Income Source</option>
                                        <option value="pension">{{ __('Pension') }}</option>
                                        <option value="regular_remittance">{{ __('Regular Remittance') }}</option>
                                        <option value="investment">{{ __('Investment') }}</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="monthly_income">{{ __('Monthly Income') }}</label>
                                    <select id="monthly_income" class="form-control" name="monthly_income">
                                        <option value="" disabled selected>Select Monthly Income</option>
                                        <option value="below_10000">{{ __('Below PHP 10,000') }}</option>
                                        <option value="10000_19999">{{ __('PHP 10,000 - PHP 19,999') }}</option>
                                        <option value="20000_49999">{{ __('PHP 20,000 - PHP 49,999') }}</option>
                                        <option value="50000_99999">{{ __('PHP 50,000 - PHP 99,999') }}</option>
                                        <option value="above_100000">{{ __('Above PHP 100,000') }}</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Section 5: Family Background -->
                            <div id="section5" style="display: none;">
                                <div class="card-header bg-dark text-white">
                                    <h7 class="mb-0">{{ __('Family Background') }}</h7>
                                </div><br>

                                <!-- Father Information -->
                                <div class="form-group">
                                    <label for="father_fname">{{ __('Father\'s First Name') }}</label>
                                    <input id="father_fname" type="text" class="form-control" name="father_fname">
                                </div>

                                <div class="form-group">
                                    <label for="father_mname">{{ __('Father\'s Middle Name') }}</label>
                                    <input id="father_mname" type="text" class="form-control" name="father_mname">
                                </div>

                                <div class="form-group">
                                    <label for="father_lname">{{ __('Father\'s Last Name') }}</label>
                                    <input id="father_lname" type="text" class="form-control" name="father_lname">
                                </div>

                                <div class="form-group">
                                    <label for="father_suffix">{{ __('Father\'s Suffix') }}</label>
                                    <input id="father_suffix" type="text" class="form-control" name="father_suffix">
                                </div>

                                <div class="form-group">
                                    <label for="father_dob">{{ __('Father\'s Date of Birth') }}</label>
                                    <input id="father_dob" type="date" class="form-control" name="father_dob">
                                </div>

                                <div class="form-group">
                                    <label for="father_age">{{ __('Father\'s Age') }}</label>
                                    <input id="father_age" type="number" class="form-control" name="father_age">
                                </div>

                                <div class="form-group">
                                    <label for="father_contact">{{ __('Father\'s Contact Number') }}</label>
                                    <input id="father_contact" type="tel" class="form-control" name="father_contact">
                                </div>

                                <div class="form-group">
                                    <label for="father_occu">{{ __('Father\'s Occupation') }}</label>
                                    <input id="father_occu" type="text" class="form-control" name="father_occu">
                                </div>

                                <!-- Mother Information -->
                                <div class="form-group">
                                    <label for="mother_fname">{{ __('Mother\'s First Name') }}</label>
                                    <input id="mother_fname" type="text" class="form-control" name="mother_fname">
                                </div>

                                <div class="form-group">
                                    <label for="mother_mname">{{ __('Mother\'s Middle Name') }}</label>
                                    <input id="mother_mname" type="text" class="form-control" name="mother_mname">
                                </div>

                                <div class="form-group">
                                    <label for="mother_lname">{{ __('Mother\'s Last Name') }}</label>
                                    <input id="mother_lname" type="text" class="form-control" name="mother_lname">
                                </div>

                                <div class="form-group">
                                    <label for="mother_suffix">{{ __('Mother\'s Suffix') }}</label>
                                    <input id="mother_suffix" type="text" class="form-control" name="mother_suffix">
                                </div>

                                <div class="form-group">
                                    <label for="mother_dob">{{ __('Mother\'s Date of Birth') }}</label>
                                    <input id="mother_dob" type="date" class="form-control" name="mother_dob">
                                </div>

                                <div class="form-group">
                                    <label for="mother_age">{{ __('Mother\'s Age') }}</label>
                                    <input id="mother_age" type="number" class="form-control" name="mother_age">
                                </div>

                                <div class="form-group">
                                    <label for="mother_contact">{{ __('Mother\'s Contact Number') }}</label>
                                    <input id="mother_contact" type="tel" class="form-control" name="mother_contact">
                                </div>

                                <div class="form-group">
                                    <label for="mother_occu">{{ __('Mother\'s Occupation') }}</label>
                                    <input id="mother_occu" type="text" class="form-control" name="mother_occu">
                                </div>

                                <!-- Spouse Information -->
                                <div class="form-group">
                                    <label for="spouse_fname">{{ __('Spouse\'s First Name') }}</label>
                                    <input id="spouse_fname" type="text" class="form-control" name="spouse_fname">
                                </div>

                                <div class="form-group">
                                    <label for="spouse_mname">{{ __('Spouse\'s Middle Name') }}</label>
                                    <input id="spouse_mname" type="text" class="form-control" name="spouse_mname">
                                </div>

                                <div class="form-group">
                                    <label for="spouse_lname">{{ __('Spouse\'s Last Name') }}</label>
                                    <input id="spouse_lname" type="text" class="form-control" name="spouse_lname">
                                </div>

                                <div class="form-group">
                                    <label for="spouse_suffix">{{ __('Spouse\'s Suffix') }}</label>
                                    <input id="spouse_suffix" type="text" class="form-control" name="spouse_suffix">
                                </div>

                                <div class="form-group">
                                    <label for="spouse_dob">{{ __('Spouse\'s Date of Birth') }}</label>
                                    <input id="spouse_dob" type="date" class="form-control" name="spouse_dob">
                                </div>

                                <div class="form-group">
                                    <label for="spouse_age">{{ __('Spouse\'s Age') }}</label>
                                    <input id="spouse_age" type="number" class="form-control" name="spouse_age">
                                </div>

                                <div class="form-group">
                                    <label for="spouse_contact">{{ __('Spouse\'s Contact Number') }}</label>
                                    <input id="spouse_contact" type="tel" class="form-control" name="spouse_contact">
                                </div>

                                <div class="form-group">
                                    <label for="spouse_occu">{{ __('Spouse\'s Occupation') }}</label>
                                    <input id="spouse_occu" type="text" class="form-control" name="spouse_occu">
                                </div>

                                <div class="form-group">
                                    <label for="spouse_emp_name">{{ __('Spouse\'s Employer Name') }}</label>
                                    <input id="spouse_emp_name" type="text" class="form-control" name="spouse_emp_name">
                                </div>

                                <div class="form-group">
                                    <label for="spouse_emp_stat">{{ __('Spouse\'s Employment Status') }}</label>
                                    <select id="spouse_emp_stat" class="form-control" name="spouse_emp_stat">
                                        <option value="" disabled selected>Select Employment Status</option>
                                        <option value="regular">{{ __('Regular') }}</option>
                                        <option value="contractual">{{ __('Contractual') }}</option>
                                        <option value="casual">{{ __('Casual') }}</option>
                                        <option value="job_order">{{ __('Job Order') }}</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="spouse_monthly_income">{{ __('Spouse\'s Monthly Income') }}</label>
                                    <input id="spouse_monthly_income" type="number" class="form-control" name="spouse_monthly_income">
                                </div>

                                <!-- Number of Children -->
                                <div class="form-group">
                                    <label for="no_child">{{ __('Number of Children Living with You') }}</label>
                                    <input id="no_child" type="number" class="form-control" name="no_child">
                                </div>

                                <!-- Number of Children Contributing to Monthly Income -->
                                <div class="form-group">
                                    <label for="no_child_contrib">{{ __('Number of Children Contributing to Household Income') }}</label>
                                    <input id="no_child_contrib" type="number" class="form-control" name="no_child_contrib">
                                </div>

                                <!-- Total Monthly Contribution from Children -->
                                <div class="form-group">
                                    <label for="total_monthly_contrib">{{ __('Total Monthly Contribution') }}</label>
                                    <input id="total_monthly_contrib" type="number" class="form-control" name="total_monthly_contrib">
                                </div>

                                <!-- Number of Children Working -->
                                <div class="form-group">
                                    <label for="no_child_work">{{ __('Number of Children Currently Working') }}</label>
                                    <input id="no_child_work" type="number" class="form-control" name="no_child_work">
                                </div>

                                <!-- Number of Children Currently Studying -->
                                <div class="form-group">
                                    <label for="no_child_study">{{ __('Number of Children Currently Studying') }}</label>
                                    <input id="no_child_study" type="number" class="form-control" name="no_child_study">
                                </div>

                                <!-- Number of Children Not Currently Studying -->
                                <div class="form-group">
                                    <label for="no_child_notstudy">{{ __('Number of Children Not Currently Studying') }}</label>
                                    <input id="no_child_notstudy" type="number" class="form-control" name="no_child_notstudy">
                                </div>

                                <!-- Yearly Income of the Household -->
                                <div class="form-group">
                                    <label for="house_yearly_income">{{ __('Annual Income of the Household') }}</label>
                                    <select id="house_yearly_income" class="form-control" name="house_yearly_income">
                                        <option value="" disabled selected>Select Annual Income</option>
                                        <option value="150000_249999">PHP 150,000 - PHP 249,999</option>
                                        <option value="250000_349999">PHP 250,000 - PHP 349,999</option>
                                        <option value="350000_449999">PHP 350,000 - PHP 449,999</option>
                                        <option value="450000_549999">PHP 450,000 - PHP 549,999</option>
                                        <option value="550000_649999">PHP 550,000 - PHP 649,999</option>
                                        <option value="650000_749999">PHP 650,000 - PHP 749,999</option>
                                        <option value="750000_849999">PHP 750,000 - PHP 849,999</option>
                                        <option value="850000_949999">PHP 850,000 - PHP 949,999</option>
                                        <option value="950000_1299999">PHP 950,000 - PHP 1,299,999</option>
                                        <option value="1300000_1499999">PHP 1,300,000 - PHP 1,499,999</option>
                                        <option value="1500000_1999999">PHP 1,500,000 - PHP 1,999,999</option>
                                        <option value="2000000_2499999">PHP 2,000,000 - PHP 2,499,999</option>
                                        <option value="2500000_2999999">PHP 2,500,000 - PHP 2,999,999</option>
                                        <option value="3000000_3499999">PHP 3,000,000 - PHP 3,499,999</option>
                                        <option value="above_3500000">Above PHP 3,500,000</option>
                                    </select>
                                </div>

                                <!-- Emergency Contact Information -->
                                <div class="form-group">
                                    <label for="emer_name">{{ __('Emergency Contact Name') }}</label>
                                    <input id="emer_name" type="text" class="form-control" name="emer_name">
                                </div>

                                <div class="form-group">
                                    <label for="emer_contact">{{ __('Emergency Contact Number') }}</label>
                                    <input id="emer_contact" type="tel" class="form-control" name="emer_contact">
                                </div>

                                <div class="form-group">
                                    <label for="emer_address">{{ __('Emergency Contact Address') }}</label>
                                    <input id="emer_address" type="text" class="form-control" name="emer_address">
                                </div>
                            </div>

                            <!-- Section 6: Beneficiaries -->
                            <div id="section6" style="display: none;">
                                <div class="card-header bg-dark text-white">
                                    <h7 class="mb-0">{{ __('Beneficiaries') }}</h7>
                                </div><br>

                                <!-- Beneficiary 1 -->
                                <div class="form-group">
                                    <label for="ben_fname">{{ __('First Name') }}</label>
                                    <input id="ben_fname" type="text" class="form-control" name="ben_fname" required>
                                </div>
                                <div class="form-group">
                                    <label for="ben_mname">{{ __('Middle Name') }}</label>
                                    <input id="ben_mname" type="text" class="form-control" name="ben_mname">
                                </div>
                                <div class="form-group">
                                    <label for="ben_lname">{{ __('Last Name') }}</label>
                                    <input id="ben_lname" type="text" class="form-control" name="ben_lname" required>
                                </div>
                                <div class="form-group">
                                    <label for="ben_suffix">{{ __('Suffix') }}</label>
                                    <input id="ben_suffix" type="text" class="form-control" name="ben_suffix">
                                </div>
                                <div class="form-group">
                                    <label for="ben_dob">{{ __('Date of Birth') }}</label>
                                    <input id="ben_dob" type="date" class="form-control" name="ben_dob" required>
                                </div>
                                <div class="form-group">
                                    <label for="ben_relationship">{{ __('Relationship') }}</label>
                                    <input id="ben_relationship" type="text" class="form-control" name="ben_relationship" required>
                                </div>
                            </div>

                            <!-- Section 7: Declaration and Specimen Signature -->
                            <div id="section7" style="display: none;">
                                <div class="card-header bg-dark text-white">
                                    <h7 class="mb-0">{{ __('Declaration and Specimen Signature') }}</h7>
                                </div><br>
                                
                                <!-- E-Signature field -->
                                <div class="form-group">
                                    <label for="e_signature">{{ __('E-Signature') }}</label>
                                    <input id="e_signature" type="file" class="form-control-file" name="e_signature" accept="image/*">
                                    <small class="form-text text-muted">Upload a clear scanned e-signature.</small>
                                </div>

                                <div class="form-group">
                                    <label for="id_photo">{{ __('ID Photo') }}</label>
                                    <input type="file" id="id_photo" name="id_photo" class="form-control-file" accept="image/*">
                                    <small class="form-text text-muted">Upload a formal ID photo.</small>
                                </div>

                                <!-- Application Date field -->
                                <div class="form-group">
                                    <label for="app_date">{{ __('Application Date') }}</label>
                                    <input id="app_date" type="date" class="form-control" name="app_date">
                                </div>
                            </div>

                            <!-- Submit button -->

                            <!-- Navigation buttons -->
                            <div class="form-group mt-5 d-flex justify-content-between">
                                <a href="{{ route('members.index') }}" class="btn btn-danger"><i class="fas fa-times-circle mr-1"></i>{{ __('Cancel') }}</a>
                                <button type="reset" class="btn btn-warning"><i class="fas fa-sync-alt mr-1"></i>{{ __('Reset') }}</button>
                                <button type="button" class="btn btn-secondary prev-section" style="display: none;"><i class="fas fa-arrow-circle-left mr-1"></i>Previous</button>
                                <button type="button" class="btn btn-primary next-section"><i class="fas fa-arrow-circle-right mr-1"></i>Next</button>
                                <button type="submit" class="btn btn-success" id="submitButtonContainer" style="display: none;"><i class="fas fa-check-circle mr-1"></i>Create</button>
                            </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let currentSection = 1;
            const totalSections = 7; // Update this with the total number of sections

            // Event listener for next section button
            document.querySelector('.next-section').addEventListener('click', function () {
                if (currentSection < totalSections) {
                    showSection(++currentSection);
                }

                if (currentSection === totalSections) {
                    document.getElementById('submitButtonContainer').style.display = 'block';
                    document.querySelector('.next-section').style.display = 'none'; // Hide the next button on the last step
                }

                updateSectionHeader(currentSection);
                showHideButtons(currentSection);
            });

            // Event listener for previous section button
            document.querySelector('.prev-section').addEventListener('click', function () {
                if (currentSection > 1) {
                    showSection(--currentSection);
                }

                if (currentSection !== totalSections) {
                    document.getElementById('submitButtonContainer').style.display = 'none';
                    document.querySelector('.next-section').style.display = 'block'; // Show the next button on previous steps
                }

                updateSectionHeader(currentSection);
                showHideButtons(currentSection);
            });

            function showHideButtons(sectionNumber) {
                // Show/hide previous button
                const prevButton = document.querySelector('.prev-section');
                prevButton.style.display = sectionNumber === 1 ? 'none' : 'block';

                // Show/hide next button
                const nextButton = document.querySelector('.next-section');
                nextButton.style.display = sectionNumber === totalSections ? 'none' : 'block';
            }

            function showSection(sectionNumber) {
                // Hide all sections
                document.querySelectorAll('[id^="section"]').forEach(function (section) {
                    section.style.display = 'none';
                });

                // Show the current section
                document.getElementById('section' + sectionNumber).style.display = 'block';
            }

            function updateSectionHeader(sectionNumber) {
                const sectionHeaders = {
                    1: 'Personal Information',
                    2: 'Employment',
                    // Add more headers as needed
                };

                document.querySelector('.card-header').innerText = sectionHeaders[sectionNumber];
            }
        });
    </script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Get the 'house' dropdown element
        const houseDropdown = document.getElementById('house');

        // Get the 'house_month' field container
        const houseMonthField = document.getElementById('houseMonthField');

        // Hide the 'house_month' field initially
        houseMonthField.style.display = 'none';

        // Add change event listener to the 'house' dropdown
        houseDropdown.addEventListener('change', function () {
            // If 'own' is selected, hide 'house_month'; otherwise, show it
            houseMonthField.style.display = houseDropdown.value === 'own' ? 'none' : 'block';
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Get the 'lot' dropdown element
        const lotDropdown = document.getElementById('lot');

        // Get the 'lot_month' field container
        const lotMonthField = document.getElementById('lotMonthField');

        // Hide the 'lot_month' field initially
        lotMonthField.style.display = 'none';

        // Add change event listener to the 'lot' dropdown
        lotDropdown.addEventListener('change', function () {
            // If 'own' is selected, hide 'lot_month'; otherwise, show it
            lotMonthField.style.display = lotDropdown.value === 'own' ? 'none' : 'block';
        });
    });
</script>

<script>
// Event listener for changes in the Employment Status dropdown
document.getElementById('emp_stat').addEventListener('change', function () {
    const empTypeField = document.getElementById('emp_type');
    const businessTypeField = document.getElementById('business_type');
    const assetSizeField = document.getElementById('asset_size');
    const businessTypeLabel = document.querySelector('label[for="business_type"]');
    const assetSizeLabel = document.querySelector('label[for="asset_size"]');

    // Reset and hide the Business Type field, and Asset Size field
    empTypeField.innerHTML = '';
    empTypeField.style.display = 'none';
    businessTypeField.style.display = 'none';
    assetSizeField.style.display = 'none';
    businessTypeLabel.style.display = 'none';
    assetSizeLabel.style.display = 'none';

    // Define options based on the selected Employment Status
    const empStatValue = this.value;

    if (empStatValue === 'private_employee' || empStatValue === 'government_employee') {
        const options = ['Regular', 'Contractual', 'Casual', 'Job Order'];
        showOptions(options);
    } else if (empStatValue === 'office_worker') {
        const options = ['Administrator', 'Executive Officer', 'Manager', 'Clerical Staff', 'Sales/Marketing Staff', 'Maintenance Personnel'];
        showOptions(options);
    } else if (empStatValue === 'skilled_worker') {
        const options = ['Carpenter', 'Driver', 'Mason', 'Tailor'];
        showOptions(options);
    } else if (empStatValue === 'laborer_helper') {
        const options = ['Driver', 'Construction', 'Nanny', 'Worker'];
        showOptions(options);
    } else if (empStatValue === 'church_worker') {
        const options = ['Volunteer', 'Part-time', 'Full-time', 'Casual', 'Permanent'];
        showOptions(options);
    } else if (empStatValue === 'self_employed_professional') {
        const options = ['Doctor', 'Architect', 'Accountant', 'Engineer'];
        showOptions(options);
    } else if (empStatValue === 'self_employed_nonprofessional') {
        const options = ['Vendor', 'Appliances Repairer', 'Shoemaker', 'Cellphone Repairer'];
        showOptions(options);
    } else if (empStatValue === 'farmer') {
        const options = ['Land Owner', 'Tenant', 'Laborer'];
        showOptions(options);
    } else if (empStatValue === 'business_owner') {
        // Show Business Type and Asset Size fields
        businessTypeField.style.display = 'block';
        assetSizeField.style.display = 'block';

        // Show the labels for Business Type and Asset Size
        businessTypeLabel.style.display = 'block';
        assetSizeLabel.style.display = 'block';

        // Define options for Asset Size
        const assetSizeOptions = [
            'Below PHP 100,000.00',
            'PHP 100,000.00 - PHP 1,000,000.00',
            'PHP 1,000,000.00 - PHP 5,000,000.00',
            'PHP 5,000,000.00 - PHP 10,000,000.00',
            'Above PHP 10,000,001.00'
        ];
        showOptions(assetSizeOptions, assetSizeField);
    }

    // Function to show options in the Employment Type dropdown
    function showOptions(options, targetField) {
        const field = targetField || empTypeField;
        field.style.display = 'block';

        options.forEach(option => {
            const optionElement = document.createElement('option');
            optionElement.value = option.toLowerCase().replace(/\s+/g, '_'); // Convert to lowercase and replace spaces with underscores
            optionElement.text = option;
            field.add(optionElement);
        });
    }
});

</script>

@endsection
</body>
</html>
