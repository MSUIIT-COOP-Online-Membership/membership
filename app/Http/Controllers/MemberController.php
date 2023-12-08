<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\Beneficiary;
use App\Models\Employment;
use App\Models\Employer;
use App\Models\Business;
use App\Models\Father;
use App\Models\Mother;
use App\Models\Spouse;
use App\Models\Child;
use App\Models\House;
use App\Models\Emergency;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use RealRashid\SweetAlert\Facades\Alert;

class MemberController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the members.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $members = Member::all();
        return view('members.index', compact('members'));
    }

    /**
     * Show the form for creating a new member.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('members.create');
    }

    /**
     * Store a newly created member in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        try {
             $request->validate([
                'id_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:25000',
                'lname' => 'nullable|string|max:255',
                'mname' => 'nullable|string|max:255',
                'fname' => 'nullable|string|max:255',
                'suffix' => 'nullable|string|max:255',
                'sex' => 'nullable|string|max:255',
                'civil_status' => 'nullable|string|max:255',
                'dob' => 'nullable|date',
                'age' => 'nullable|integer',
                'tel_no' => 'nullable|string|max:255',
                'mobile_no' => 'nullable|string|max:255',
                'religion' => 'nullable|string|max:255',
                'email' => 'nullable|email|max:255',
                'place_birth' => 'nullable|string|max:255',
                'present_address' => 'nullable|string|max:255',
                'tin' => 'nullable|integer',
                'educational_attainment' => 'nullable|string|max:255',
                'e_signature' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:25000',
                'app_date' => 'nullable|date',

                // Employment information validation rules
                'employments.emp_stat' => 'nullable|string|max:255',
                'employments.emp_type' => 'nullable|string|max:255',
                'employments.profession' => 'nullable|string|max:255',
                'employments.emp_others' => 'nullable|string|max:255',
                'employments.business_type' => 'nullable|string|max:255',
                'employments.asset_size' => 'nullable|string|max:255',

                // Employer information validation rules
                'employers.employer_name' => 'nullable|string|max:255',
                'employers.service_length' => 'nullable|string|max:255',
                'employers.employer_status' => 'nullable|string|max:255',
                'employers.employer_address' => 'nullable|string|max:255',
                'employers.employer_contact' => 'nullable|string|max:255',
                'employers.monthly_salary' => 'nullable|string|max:255',

                // Business information validation rules
                'businesses.business_name' => 'nullable|string|max:255',
                'businesses.business_tin' => 'nullable|integer',
                'businesses.business_address' => 'nullable|string|max:255',
                'businesses.business_contact' => 'nullable|string|max:255',
                'businesses.op_duration_year' => 'nullable|integer',
                'businesses.op_duration_month' => 'nullable|integer',
                'businesses.no_workers' => 'nullable|integer',
                'businesses.yearly_income' => 'nullable|string|max:255',
                'businesses.source_income' => 'nullable|string|max:255',
                'businesses.monthly_income' => 'nullable|string|max:255',

                // Father information validation rules
                'fathers.father_fname' => 'nullable|string|max:255',
                'fathers.father_mname' => 'nullable|string|max:255',
                'fathers.father_lname' => 'nullable|string|max:255',
                'fathers.father_suffix' => 'nullable|string|max:255',
                'fathers.father_dob' => 'nullable|date',
                'fathers.father_age' => 'nullable|integer',
                'fathers.father_contact' => 'nullable|string|max:255',
                'fathers.father_occu' => 'nullable|string|max:255',

                // Mother information validation rules
                'mothers.mother_fname' => 'nullable|string|max:255',
                'mothers.mother_mname' => 'nullable|string|max:255',
                'mothers.mother_lname' => 'nullable|string|max:255',
                'mothers.mother_suffix' => 'nullable|string|max:255',
                'mothers.mother_dob' => 'nullable|date',
                'mothers.mother_age' => 'nullable|integer',
                'mothers.mother_contact' => 'nullable|string|max:255',
                'mothers.mother_occu' => 'nullable|string|max:255',

                // Spouse information validation rules 
                'spouses.spouse_fname' => 'nullable|string|max:255',
                'spouses.spouse_mname' => 'nullable|string|max:255',
                'spouses.spouse_lname' => 'nullable|string|max:255',
                'spouses.spouse_suffix' => 'nullable|string|max:255',
                'spouses.spouse_dob' => 'nullable|date',
                'spouses.spouse_age' => 'nullable|integer',
                'spouses.spouse_contact' => 'nullable|string|max:255',
                'spouses.spouse_occu' => 'nullable|string|max:255',
                'spouses.spouse_emp_name' => 'nullable|string|max:255',
                'spouses.spouse_emp_stat' => 'nullable|string|max:255',
                'spouses.spouse_monthly_income' => 'nullable|string|max:255',

                // Child information validation rules 
                'children.no_child' => 'nullable|integer',
                'children.no_child_contrib' => 'nullable|integer',
                'children.total_monthly_contrib' => 'nullable|string|max:255',
                'children.no_child_work' => 'nullable|integer',
                'children.no_child_study' => 'nullable|integer',
                'children.no_child_notstudy' => 'nullable|integer',

                // House information validation rules
                'houses.duration_residency' => 'nullable|string|max:255',
                'houses.living_parents' => 'nullable|string|max:255',
                'houses.house' => 'nullable|string|max:255',
                'houses.house_month' => 'nullable|integer',
                'houses.lot' => 'nullable|string|max:255',
                'houses.lot_month' => 'nullable|integer',
                'houses.house_yearly_income' => 'nullable|string|max:255',

                // Emergency information validation rules
                'emergencies.emer_name' => 'nullable|string|max:255',
                'emergencies.emer_contact' => 'nullable|string|max:255',
                'emergencies.emer_address' => 'nullable|string|max:255',

            ]);

            // Output employment data for debugging
            //dd($request->input('employments'));

            if ($request->hasFile('id_photo')) {
                $image = $request->file('id_photo');
                $imageName = 'id_photo_' . time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images/id_photos/'), $imageName);
                $request->merge(['id_photo' => $imageName]);
            }

            if ($request->hasFile('e_signature')) {
                $image = $request->file('e_signature');
                $imageName = 'e_signature_' . time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images/e_signatures/'), $imageName);
                $request->merge(['e_signature' => $imageName]);
            }

            $member = Member::create([
                'id_photo' => $request->input('id_photo'),
                'lname' => $request->input('lname'),
                'mname' => $request->input('mname'),
                'fname' => $request->input('fname'),
                'suffix' => $request->input('suffix'),
                'sex' => $request->input('sex'),
                'civil_status' => $request->input('civil_status'),
                'dob' => $request->input('dob'),
                'age' => $request->input('age'),
                'tel_no' => $request->input('tel_no'),
                'mobile_no' => $request->input('mobile_no'),
                'religion' => $request->input('religion'),
                'email' => $request->input('email'),
                'place_birth' => $request->input('place_birth'),
                'present_address' => $request->input('present_address'),
                'tin' => $request->input('tin'),
                'educational_attainment' => $request->input('educational_attainment'), 
                'e_signature' => $request->input('e_signature'),
                'app_date' => $request->input('app_date'),
            ]);

            // Process and store each employment data
            if ($request->filled('employments.emp_stat')) {
                // Store employment data in the employments table
                Employment::create([
                    'member_id' => $member->id,
                    'emp_stat' => $request->input('employments.emp_stat'),
                    'emp_type' => $request->input('employments.emp_type'),
                    'profession' => $request->input('employments.profession'),
                    'emp_others' => $request->input('employments.emp_others'),
                    'business_type' => $request->input('employments.business_type'),
                    'asset_size' => $request->input('employments.asset_size'),
                ]);
            }

            // Process and store each employer data
            if ($request->filled('employers.employer_name')) {
                // Store employer data in the employers table
                Employer::create([
                    'member_id' => $member->id,
                    'employer_name' => $request->input('employers.employer_name'),
                    'service_length' => $request->input('employers.service_length'),
                    'employer_status' => $request->input('employers.employer_status'),
                    'employer_address' => $request->input('employers.employer_address'),
                    'employer_contact' => $request->input('employers.employer_contact'),
                    'monthly_salary' => $request->input('employers.monthly_salary'),
                ]);
            }

            // Process and store each business data
            if ($request->filled('businesses.business_name')) {
                // Store business data in the businesses table
                Business::create([
                    'member_id' => $member->id,
                    'business_name' => $request->input('businesses.business_name'),
                    'business_tin' => $request->input('businesses.business_tin'),
                    'business_address' => $request->input('businesses.business_address'),
                    'business_contact' => $request->input('businesses.business_contact'),
                    'op_duration_year' => $request->input('businesses.op_duration_year'),
                    'op_duration_month' => $request->input('businesses.op_duration_month'),
                    'no_workers' => $request->input('businesses.no_workers'),
                    'yearly_income' => $request->input('businesses.yearly_income'),
                    'source_income' => $request->input('businesses.source_income'),
                    'monthly_income' => $request->input('businesses.monthly_income'),
                ]);
            }

            // Process and store each father data
            if ($request->filled('fathers.father_fname')) {
                // Store father data in the fathers table
                Father::create([
                    'member_id' => $member->id,
                    'father_fname' => $request->input('fathers.father_fname'),
                    'father_mname' => $request->input('fathers.father_mname'),
                    'father_lname' => $request->input('fathers.father_lname'),
                    'father_suffix' => $request->input('fathers.father_suffix'),
                    'father_dob' => $request->input('fathers.father_dob'),
                    'father_age' => $request->input('fathers.father_age'),
                    'father_contact' => $request->input('fathers.father_contact'),
                    'father_occu' => $request->input('fathers.father_occu'),
                ]);
            }

            // Process and store each mother data
            if ($request->filled('mothers.mother_fname')) {
                // Store mother data in the mothers table
                Mother::create([
                    'member_id' => $member->id,
                    'mother_fname' => $request->input('mothers.mother_fname'),
                    'mother_mname' => $request->input('mothers.mother_mname'),
                    'mother_lname' => $request->input('mothers.mother_lname'),
                    'mother_suffix' => $request->input('mothers.mother_suffix'),
                    'mother_dob' => $request->input('mothers.mother_dob'),
                    'mother_age' => $request->input('mothers.mother_age'),
                    'mother_contact' => $request->input('mothers.mother_contact'),
                    'mother_occu' => $request->input('mothers.mother_occu'),
                ]);
            }

            // Process and store each spouse data
            if ($request->filled('spouses.spouse_fname')) {
                // Store spouse data in the spouses table
                Spouse::create([
                    'member_id' => $member->id,
                    'spouse_fname' => $request->input('spouses.spouse_fname'),
                    'spouse_mname' => $request->input('spouses.spouse_mname'),
                    'spouse_lname' => $request->input('spouses.spouse_lname'),
                    'spouse_suffix' => $request->input('spouses.spouse_suffix'),
                    'spouse_dob' => $request->input('spouses.spouse_dob'),
                    'spouse_age' => $request->input('spouses.spouse_age'),
                    'spouse_contact' => $request->input('spouses.spouse_contact'),
                    'spouse_occu' => $request->input('spouses.spouse_occu'),
                    'spouse_emp_name' => $request->input('spouses.spouse_emp_name'),
                    'spouse_emp_stat' => $request->input('spouses.spouse_emp_stat'),
                    'spouse_monthly_income' => $request->input('spouses.spouse_monthly_income'),
                ]);
            }

            // Process and store each child data
            if ($request->filled('children.no_child')) {
                // Store child data in the children table
                Child::create([
                    'member_id' => $member->id,
                    'no_child' => $request->input('children.no_child'),
                    'no_child_contrib' => $request->input('children.no_child_contrib'),
                    'total_monthly_contrib' => $request->input('children.total_monthly_contrib'),
                    'no_child_work' => $request->input('children.no_child_work'),
                    'no_child_study' => $request->input('children.no_child_study'),
                    'no_child_notstudy' => $request->input('children.no_child_notstudy'),
                ]);
            }

            // Process and store each house data
            if ($request->filled('houses.duration_residency')) {
                // Store house data in the houses table
                House::create([
                    'member_id' => $member->id,
                    'duration_residency' => $request->input('houses.duration_residency'),
                    'living_parents' => $request->input('houses.living_parents'),
                    'house' => $request->input('houses.house'),
                    'house_month' => $request->input('houses.house_month'),
                    'lot' => $request->input('houses.lot'),
                    'lot_month' => $request->input('houses.lot_month'),
                    'house_yearly_income' => $request->input('houses.house_yearly_income'),
                ]);
            }

            // Process and store each emergency data
            if ($request->filled('emergencies.emer_name')) {
                // Store emergency data in the emergencies table
                Emergency::create([
                    'member_id' => $member->id,
                    'emer_name' => $request->input('emergencies.emer_name'),
                    'emer_contact' => $request->input('emergencies.emer_contact'),
                    'emer_address' => $request->input('emergencies.emer_address'),
                ]);
            }

            // Process and store each beneficiary
             if ($request->has('beneficiaries')) {
                foreach ($request->input('beneficiaries') as $beneficiaryData) {
                    // You may also add validation for each beneficiary data
                    Beneficiary::create([
                        'member_id' => $member->id,
                        'ben_fname' => $beneficiaryData['ben_fname'],
                        'ben_mname' => $beneficiaryData['ben_mname'],
                        'ben_lname' => $beneficiaryData['ben_lname'],
                        'ben_suffix' => $beneficiaryData['ben_suffix'],
                        'ben_dob' => $beneficiaryData['ben_dob'],
                        'ben_relationship' => $beneficiaryData['ben_relationship'],
                    ]);
                }
            }

            // Check if the form is in edit mode
            if ($request->session()->has('edit_mode')) {
                // Handle form editing logic here
                $memberId = $request->session()->get('member_id'); // Replace with the actual session key

                // Retrieve the member record from the database
                $member = Member::find($memberId);

                // Populate the form fields with the retrieved data
                return view('your_form_view', compact('member'))->with('edit_mode', true);
            }

            Alert::success('Success!', 'Added member successfully.');

            // You can redirect to the member's profile or any other page after creation
            return redirect()->route('members.index')->with('success', 'Member added successfully!');
        } catch (\Exception $e) {
                Alert::error('Error', 'Error Message: ' . $e->getMessage());
                return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function show($id)
    {
        $member = Member::findOrFail($id);
        return view('members.show', compact('member'));
    }

    public function edit($id)
    {
        $member = Member::findOrFail($id);
        return view('members.edit', compact('member'));
    }

    /**
     * Update the specified member in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        try {
        // Validate the incoming request data
        $request->validate([
                'id_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:25000',
                'lname' => 'required|string|max:255',
                'mname' => 'required|string|max:255',
                'fname' => 'required|string|max:255',
                'suffix' => 'nullable|string|max:255',
                'sex' => 'nullable|string|max:255',
                'civil_status' => 'nullable|string|max:255',
                'dob' => 'nullable|date',
                'age' => 'nullable|integer',
                'tel_no' => 'nullable|string|max:255',
                'mobile_no' => 'nullable|string|max:255',
                'religion' => 'nullable|string|max:255',
                'email' => 'nullable|email|max:255',
                'place_birth' => 'nullable|string|max:255',
                'present_address' => 'nullable|string|max:255',
                'tin' => 'nullable|integer',
                'educational_attainment' => 'nullable|string|max:255',
                'e_signature' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:25000',
                'app_date' => 'nullable|date',
        ]);

        $member = Member::find($id);
        
        if ($request->hasFile('id_photo')) {
            $image = $request->file('id_photo');
            $imageName = 'id_photo_' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/id_photos/'), $imageName);
            $request->merge(['id_photo' => $imageName]);
        }

        if ($request->hasFile('e_signature')) {
            $image = $request->file('e_signature');
            $imageName = 'e_signature_' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/e_signatures/'), $imageName);
            $request->merge(['e_signature' => $imageName]);
        }

        // Update the member instance with the validated data
        $member->save();

        Alert::success('Success!', 'Updated member successfully.');

        // You can redirect to the member's profile or any other page after updating
        return redirect()->route('members.index')->with('success', 'Member updated successfully!');
    } catch (\Exception $e) {
        Alert::error('Error', 'Error Message: ' . $e->getMessage());
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }
    }

    public function destroy($id)
    {
        try {
            $member = Member::findOrFail($id);
            $member->delete();

            return response()->json(['success' => true, 'message' => 'Member deleted successfully.']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error: ' . $e->getMessage()]);
        }
    }

}
