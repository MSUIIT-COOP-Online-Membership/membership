<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Branch;
use App\Models\Evaluation;

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
                'house_month' => 'nullable|integer',
                'lot' => 'nullable|string|max:255',
                'lot_month' => 'nullable|integer',
                'tin' => 'nullable|integer',
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
                'monthly_salary' => 'nullable|string|max:255',
                'business_name' => 'nullable|string|max:255',
                'business_tin' => 'nullable|integer',
                'business_address' => 'nullable|string|max:255',
                'business_contact' => 'nullable|string|max:255',
                'op_duration_year' => 'nullable|integer',
                'op_duration_month' => 'nullable|integer',
                'no_workers' => 'nullable|integer',
                'yearly_income' => 'nullable|string|max:255',
                'source_income' => 'nullable|string|max:255',
                'monthly_income' => 'nullable|string|max:255',
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
                'spouse_monthly_income' => 'nullable|string|max:255',
                'no_child' => 'nullable|integer',
                'no_child_contrib' => 'nullable|integer',
                'total_monthly_contrib' => 'nullable|string|max:255',
                'no_child_work' => 'nullable|integer',
                'no_child_study' => 'nullable|integer',
                'no_child_notstudy' => 'nullable|integer',
                'house_yearly_income' => 'nullable|string|max:255',
                'emer_name' => 'nullable|string|max:255',
                'emer_contact' => 'nullable|string|max:255',
                'emer_address' => 'nullable|string|max:255',
                'ben_fname' => 'nullable|string|max:255',
                'ben_mname' => 'nullable|string|max:255',
                'ben_lname' => 'nullable|string|max:255',
                'ben_suffix' => 'nullable|string|max:255',
                'ben_dob' => 'nullable|date',
                'ben_relationship' => 'nullable|string|max:255',
                'e_signature' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:25000',
                'app_date' => 'nullable|date',
            ]);

            
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

            Member::create([
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
                'duration_residency' => $request->input('duration_residency'),
                'living_parents' => $request->input('living_parents'),
                'house' => $request->input('house'),
                'house_month' => $request->input('house_month'),
                'lot' => $request->input('lot'),
                'lot_month' => $request->input('lot_month'),
                'tin' => $request->input('tin'),
                'educational_attainment' => $request->input('educational_attainment'),
                'emp_stat' => $request->input('emp_stat'),
                'emp_type' => $request->input('emp_type'),
                'profession' => $request->input('profession'),
                'emp_others' => $request->input('emp_others'),
                'business_type' => $request->input('business_type'),
                'asset_size' => $request->input('asset_size'),
                'employer_name' => $request->input('employer_name'),
                'service_length' => $request->input('service_length'),
                'employer_status' => $request->input('employer_status'),
                'employer_address' => $request->input('employer_address'),
                'employer_contact' => $request->input('employer_contact'),
                'monthly_salary' => $request->input('monthly_salary'),
                'business_name' => $request->input('business_name'),
                'business_tin' => $request->input('business_tin'),
                'business_address' => $request->input('business_address'),
                'business_contact' => $request->input('business_contact'),
                'op_duration_year' => $request->input('op_duration_year'),
                'op_duration_month' => $request->input('op_duration_month'),
                'no_workers' => $request->input('no_workers'),
                'yearly_income' => $request->input('yearly_income'),
                'source_income' => $request->input('source_income'),
                'monthly_income' => $request->input('monthly_income'),
                'father_fname' => $request->input('father_fname'),
                'father_mname' => $request->input('father_mname'),
                'father_lname' => $request->input('father_lname'),
                'father_suffix' => $request->input('father_suffix'),
                'father_dob' => $request->input('father_dob'),
                'father_age' => $request->input('father_age'),
                'father_contact' => $request->input('father_contact'),
                'father_occu' => $request->input('father_occu'),
                'mother_fname' => $request->input('mother_fname'),
                'mother_mname' => $request->input('mother_mname'),
                'mother_lname' => $request->input('mother_lname'),
                'mother_suffix' => $request->input('mother_suffix'),
                'mother_dob' => $request->input('mother_dob'),
                'mother_age' => $request->input('mother_age'),
                'mother_contact' => $request->input('mother_contact'),
                'mother_occu' => $request->input('mother_occu'),
                'spouse_fname' => $request->input('spouse_fname'),
                'spouse_mname' => $request->input('spouse_mname'),
                'spouse_lname' => $request->input('spouse_lname'),
                'spouse_suffix' => $request->input('spouse_suffix'),
                'spouse_dob' => $request->input('spouse_dob'),
                'spouse_age' => $request->input('spouse_age'),
                'spouse_contact' => $request->input('spouse_contact'),
                'spouse_occu' => $request->input('spouse_occu'),
                'spouse_emp_name' => $request->input('spouse_emp_name'),
                'spouse_emp_stat' => $request->input('spouse_emp_stat'),
                'spouse_monthly_income' => $request->input('spouse_monthly_income'),
                'no_child' => $request->input('no_child'),
                'no_child_contrib' => $request->input('no_child_contrib'),
                'total_monthly_contrib' => $request->input('total_monthly_contrib'),
                'no_child_work' => $request->input('no_child_work'),
                'no_child_study' => $request->input('no_child_study'),
                'no_child_notstudy' => $request->input('no_child_notstudy'),
                'house_yearly_income' => $request->input('house_yearly_income'),
                'emer_name' => $request->input('emer_name'),
                'emer_contact' => $request->input('emer_contact'),
                'emer_address' => $request->input('emer_address'),
                // 'ben_fname' => $request->input('ben_fname'),
                // 'ben_mname' => $request->input('ben_mname'),
                // 'ben_lname' => $request->input('ben_lname'),
                // 'ben_suffix' => $request->input('ben_suffix'),
                // 'ben_dob' => $request->input('ben_dob'),
                // 'ben_relationship' => $request->input('ben_relationship'),
                'e_signature' => $request->input('e_signature'),
                'app_date' => $request->input('app_date'),
            ]);
            
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
                'duration_residency' => 'nullable|string|max:255',
                'living_parents' => 'nullable|string|max:255',
                'house' => 'nullable|string|max:255',
                'house_month' => 'nullable|integer',
                'lot' => 'nullable|string|max:255',
                'lot_month' => 'nullable|integer',
                'tin' => 'nullable|integer',
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
                'monthly_salary' => 'nullable|string|max:255',
                'business_name' => 'nullable|string|max:255',
                'business_tin' => 'nullable|integer',
                'business_address' => 'nullable|string|max:255',
                'business_contact' => 'nullable|string|max:255',
                'op_duration_year' => 'nullable|integer',
                'op_duration_month' => 'nullable|integer',
                'no_workers' => 'nullable|integer',
                'yearly_income' => 'nullable|string|max:255',
                'source_income' => 'nullable|string|max:255',
                'monthly_income' => 'nullable|string|max:255',
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
                'spouse_monthly_income' => 'nullable|string|max:255',
                'no_child' => 'nullable|integer',
                'no_child_contrib' => 'nullable|integer',
                'total_monthly_contrib' => 'nullable|string|max:255',
                'no_child_work' => 'nullable|integer',
                'no_child_study' => 'nullable|integer',
                'no_child_notstudy' => 'nullable|integer',
                'house_yearly_income' => 'nullable|string|max:255',
                'emer_name' => 'nullable|string|max:255',
                'emer_contact' => 'nullable|string|max:255',
                'emer_address' => 'nullable|string|max:255',
                // 'ben_fname' => 'nullable|string|max:255',
                // 'ben_mname' => 'nullable|string|max:255',
                // 'ben_lname' => 'nullable|string|max:255',
                // 'ben_suffix' => 'nullable|string|max:255',
                // 'ben_dob' => 'nullable|date',
                // 'ben_relationship' => 'nullable|string|max:255',
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

    public function prememberIndex(){
        $branches = Branch::all();

        return view('guest.premembershipform', compact('branches'));

    }

    public function DisplayBranch(Request $request)
        {
            $branches = Branch::all();

            return view('guest.premembershipform', compact('branches'));
        }

    public function premembershipForm(Request $request)
    {

        $data = $request->validate([
            'lname' => 'required|string|max:255',
            'mname' => 'required|string|max:255',
            'fname' => 'required|string|max:255',
            'suffix' => 'nullable|string|max:255', //new
            'sex' => 'nullable|string|max:255',
            'civil_status' => 'nullable|string|max:255',
            'dob' => 'nullable|date',
            'age' => 'nullable|integer', //new
            'tel_no' => 'nullable|string|max:255',
            'mobile_no' => 'nullable|string|max:255',
            'religion' => 'nullable|string|max:255',  //new
            'email' => 'nullable|email|max:255',
            'place_birth' => 'nullable|string|max:255',
            'present_address' => 'nullable|string|max:255'
            // evaluation data
     
        ]);

        $PrememberInfo = Member::create($data);

         // Get the ID of the newly created Personal_info record
         $PrememberInfoId = $PrememberInfo->id;

          // Validate evaluation data
        $validatedEvaluation = $request->validate([
            'branches' => 'nullable|array',
            'q_one' => 'required|string',
            'q_two' => 'required|string',
            'q_three' => 'required|string',
            'q_four' => 'required|string',
            'q_five' => 'required|string',
            'q_six' => 'required|string',
            'q_seven' => 'required|string',
            'q_eight' => 'required|string',
            'q_nine' => 'required|string',
            'q_ten' => 'required|string',
            'score' => 'nullable|integer',
            'pass_status' => 'nullable|string'
        ]);


           // Create an evaluation for each selected branch
           foreach ($validatedEvaluation['branches'] as $branchId) {
            Evaluation::create([
                'branch_id' => $branchId,
                'member_id' => $PrememberInfoId,
                'q_one' => $data['q_one'],
                'q_two' => $data['q_two'],
                'q_three' => $data['q_three'],
                'q_four' => $data['q_four'],
                'q_five' => $data['q_five'],
                'q_six' => $data['q_six'],
                'q_seven' => $data['q_seven'],
                'q_eight' => $data['q_eight'],
                'q_nine' => $data['q_nine'],
                'q_ten' => $data['q_ten'],
            ]);
        }

        return redirect(route('premembershipform.index'));

    }

}
