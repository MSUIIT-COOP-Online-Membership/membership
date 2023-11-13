<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;

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
        $members = Member::paginate();

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
        // Validate the incoming request data
        $validatedData = $request->validate([
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
            'duration_residency' => 'nullable|string|max:255',
            'living_parents' => 'nullable|string|max:255',
            'house' => 'nullable|string|max:255',
            'house_month' => 'nullable|string|max:255',
            'lot' => 'nullable|string|max:255',
            'lot_month' => 'nullable|string|max:255',
            'tin' => 'nullable|string|max:255',
            'educational_attainment' => 'nullable|string|max:255',
            'emp_stat' => 'nullable|string|max:255',
            'emp_type' => 'nullable|string|max:255',
            'profession' => 'nullable|string|max:255',
            'emp_others' => 'nullable|string|max:255',
            'business_type' => 'nullable|string|max:255',
            'asset_size' => 'nullable|string|max:255',
            'employer_name' => 'nullable|string|max:255',
            'service_length' => 'nullable|string|max:255',
            'employer_status' => 'nullable|string|max:255',
            'employer_address' => 'nullable|string|max:255',
            'employer_contact' => 'nullable|string|max:255',
            'monthly_salary' => 'nullable|numeric',
            'business_name' => 'nullable|string|max:255',
            'business_tin' => 'nullable|string|max:255',
            'business_address' => 'nullable|string|max:255',
            'business_contact' => 'nullable|string|max:255',
            'op_duration_year' => 'nullable|string|max:255',
            'op_duration_month' => 'nullable|string|max:255',
            'no_workers' => 'nullable|integer',
            'yearly_income' => 'nullable|numeric',
            'source_income' => 'nullable|string|max:255',
            'monthly_income' => 'nullable|numeric',
            'father_fname' => 'nullable|string|max:255',
            'father_mname' => 'nullable|string|max:255',
            'father_lname' => 'nullable|string|max:255',
            'father_suffix' => 'nullable|string|max:255',
            'father_dob' => 'nullable|date',
            'father_age' => 'nullable|integer',
            'father_contact' => 'nullable|string|max:255',
            'father_occu' => 'nullable|string|max:255',
            'mother_fname' => 'nullable|string|max:255',
            'mother_mname' => 'nullable|string|max:255',
            'mother_lname' => 'nullable|string|max:255',
            'mother_suffix' => 'nullable|string|max:255',
            'mother_dob' => 'nullable|date',
            'mother_age' => 'nullable|integer',
            'mother_contact' => 'nullable|string|max:255',
            'mother_occu' => 'nullable|string|max:255',
            'spouse_fname' => 'nullable|string|max:255',
            'spouse_mname' => 'nullable|string|max:255',
            'spouse_lname' => 'nullable|string|max:255',
            'spouse_suffix' => 'nullable|string|max:255',
            'spouse_dob' => 'nullable|date',
            'spouse_age' => 'nullable|integer',
            'spouse_contact' => 'nullable|string|max:255',
            'spouse_occu' => 'nullable|string|max:255',
            'spouse_emp_name' => 'nullable|string|max:255',
            'spouse_emp_stat' => 'nullable|string|max:255',
            'spouse_monthly_income' => 'nullable|numeric',
            'no_child' => 'nullable|integer',
            'no_child_contrib' => 'nullable|integer',
            'total_monthly_contrib' => 'nullable|numeric',
            'no_child_work' => 'nullable|integer',
            'no_child_study' => 'nullable|integer',
            'no_child_notstudy' => 'nullable|integer',
            'house_yearly_income' => 'nullable|numeric',
            'emer_name' => 'nullable|string|max:255',
            'emer_contact' => 'nullable|string|max:255',
            'emer_address' => 'nullable|string|max:255',
            'ben_fname' => 'nullable|string|max:255',
            'ben_mname' => 'nullable|string|max:255',
            'ben_lname' => 'nullable|string|max:255',
            'ben_suffix' => 'nullable|string|max:255',
            'ben_dob' => 'nullable|date',
            'ben_relationship' => 'nullable|string|max:255',
            'e_signature' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'app_date' => 'nullable|date',
        ]);

        // Handle image upload
        if ($request->hasFile('e_signature')) {
            // Get the uploaded file
            $image = $request->file('e_signature');

            // Generate a unique name for the file
            $imageName = 'e_signature_' . time() . '.' . $image->getClientOriginalExtension();

            // Store the file in the public/images/e_signatures directory
            $image->storeAs('images/e_signatures', $imageName, 'public');

            // Save the file name to the database
            $validatedData['e_signature'] = $imageName;
        }

        // Create a new member instance and save to the database
        $member = Member::create($validatedData);

        // You can redirect to the member's profile or any other page after creation
        return redirect()->route('members.index')->with('success', 'Member added successfully!');
    }

    public function edit(Member $member)
    {
        return view('members.edit', compact('member'));
    }

    public function destroy(Member $member)
    {
        $member->delete();

        return redirect()->route('members.index')->with('success', 'Member deleted successfully!');
    }

    /**
     * Update the specified member in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Member $member)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'lname' => 'required|string|max:255',
            'mname' => 'required|string|max:255',
            'fname' => 'required|string|max:255',
            // Add validation rules for other fields based on your Member model
        ]);

        // Update the member instance with the validated data
        $member->update($validatedData);

        // You can redirect to the member's profile or any other page after updating
        return redirect()->route('members.index')->with('success', 'Member updated successfully!');
    }

}
