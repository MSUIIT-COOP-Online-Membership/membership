<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\Beneficiary;
use App\Models\Employments;
use App\Models\Employers;
use App\Models\Businesses;
use App\Models\Childrens;
use App\Models\Emergencies;
use App\Models\Fathers;
use App\Models\Mothers;
use App\Models\Houses;
use App\Models\Spouses;
use Illuminate\Support\Facades\Redirect;
use Dompdf\Dompdf;
use Dompdf\Options;

class MembershipApplication extends Controller
{
    public function index()
    {
        return view('members.code');
    }

    public function verifyCode(Request $request)
    {
        $code = $request->input('code');
        $member = Member::where('usercode', $code)->first();

        if ($member) {
            return view('members.membershipform', ['members' => $member], ['usercode' => $code]);
        } else {
            return redirect()->back()->with('error', 'Code not found.');
        }
    }

    public function getSubTypeOptions(Request $request)
    {
        try {
            $empType = $request->input('emp_type');
            $subTypeOptions = $this->getSubTypeOptionsByType($empType);

            return response()->json(['options' => $subTypeOptions]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    private function getSubTypeOptionsByType($empType)
    {
        // Define the options for the second dropdown based on the selected value of the first dropdown
        // Customize this function based on your specific requirements
        switch ($empType) {
            case "Office Worker":
                return ["Administrator", "Executive Officer", "Manager", "Clerical", "Sales/Marketing", "Maintenance Personnel", "Others"];
            case "Skilled Worker":
                return ["Carpenter", "Driver", "Mason", "tailor", "Others"];
            case "Laborer/Helper":
                return ["Driver", "Construction", "Nanny", "Worker", "Others"];
            case "Church Worker/Servant":
                return ["Volunteer", "Part-time", "Full-time", "Casual", "Permanent", "Others"];
            case "Self-Employed (Professional)":
                return ["Architect", "Accountant", "Engineer", "Doctor", "Others"];
                case "Self-Employed (Non-Professional)":
                    return ["Appliances Repairer", "Shoemaker", "Vendor", "Others"];
                    case "Farmer":
                        return ["Land Owner", "Tenant", "Lanorer"];
            default:
                return [];
        }
    }

    public function edit(Request $request, $user_code)
    {
        $members = Member::where('usercode', $user_code)->first();

        // Check if the member record exists
        if (!$members) {
            return view('forms.index')->with('error', 'Item not found.');
        }

        // Validate the request, including the image upload
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:40000',
            'e_signature' => 'image|mimes:jpeg,png,jpg,gif,svg|max:40000', // Adjust the validation rules as needed
            // Add other validation rules for your other fields
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');

            // Generate a unique name for the file
            $imageName = 'id_pic_' . time() . '.' . $image->getClientOriginalExtension();

            // Store the file in the public/images/e_signatures directory
            $image->storeAs('images/id_pic', $imageName, 'public');

            $members->img = str_replace('public/', '', $imageName);
        }

        if ($request->hasFile('e_signature')) {
            $esign = $request->file('e_signature');

            // Generate a unique name for the file
            $esignName = 'e_sign_' . time() . '.' . $esign->getClientOriginalExtension();

            // Store the file in the public/images/e_signatures directory
            $esign->storeAs('images/e_signatures', $esignName, 'public');

            $members->e_signature = str_replace('public/', '', $esignName);
        }

        // Update member details
        $members->update([
            'lname' => $request->input('lname'),
            'fname' => $request->input('fname'),
            'mname' => $request->input('mname'),
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
            'ben_fname' => $request->input('ben_fname'),
            'ben_mname' => $request->input('ben_mname'),
            'ben_lname' => $request->input('ben_lname'),
            'ben_suffix' => $request->input('ben_suffix'),
            'ben_dob' => $request->input('ben_dob'),
            'ben_relationship' => $request->input('ben_relationship'),
            'app_date' => $request->input('app_date')

        ]);

        $employments = new Employments();
        $employments->member_id = request('members_id');
        $employments->emp_stat = request('emp_stat');
        $employments->emp_type = request('emp_type');
        $employments->profession = request('profession');
        $employments->emp_others = request('emp_others');
        $employments->business_type = request('business_type');
        $employments->asset_size = request('asset_size');
        $employments->save();

        $employers = new Employers();
        $employers->member_id = request('members_id');
        $employers->employer_name = request('employer_name');
        $employers->service_length = request('service_length');
        $employers->employer_status = request('employer_status');
        $employers->employer_address = request('employer_address');
        $employers->employer_contact = request('employer_contact');
        $employers->monthly_salary = request('monthly_salary');
        $employers->save();

        $businesses = new Businesses();
        $businesses->member_id = request('members_id');
        $businesses->business_name = request('business_name');
        $businesses->business_tin = request('business_tin');
        $businesses->business_address = request('business_address');
        $businesses->business_contact = request('business_contact');
        $businesses->op_duration_year = request('op_duration_year');
        $businesses->op_duration_month = request('op_duration_month');
        $businesses->no_workers = request('no_workers');
        $businesses->yearly_income = request('yearly_income');
        $businesses->source_income = request('source_income');
        $businesses->monthly_income = request('monthly_income');
        $businesses->save();

        $fathers = new Fathers();
        $fathers->member_id = request('members_id');
        $fathers->father_fname = request('father_fname');
        $fathers->father_lname = request('father_lname');
        $fathers->father_mname = request('father_mname');
        $fathers->father_suffix = request('father_suffix');
        $fathers->father_dob = request('father_dob');
        $fathers->father_age = request('father_age');
        $fathers->father_contact = request('father_contact');
        $fathers->father_occu = request('father_occu');
        $fathers->save();

        $mothers = new Mothers();
        $mothers->member_id = request('members_id');
        $mothers->mother_fname = request('mother_fname');
        $mothers->mother_lname = request('mother_lname');
        $mothers->mother_mname = request('mother_mname');
        $mothers->mother_suffix = request('mother_suffix');
        $mothers->mother_dob = request('mother_dob');
        $mothers->mother_age = request('mother_age');
        $mothers->mother_contact = request('mother_contact');
        $mothers->mother_occu = request('mother_occu');
        $mothers->save();

        $spouses = new Spouses();
        $spouses->member_id = request('members_id');
        $spouses->spouse_fname = request('spouse_fname');
        $spouses->spouse_lname = request('spouse_lname');
        $spouses->spouse_mname = request('spouse_mname');
        $spouses->spouse_suffix = request('spouse_suffix');
        $spouses->spouse_dob = request('spouse_dob');
        $spouses->spouse_age = request('spouse_age');
        $spouses->spouse_contact = request('spouse_contact');
        $spouses->spouse_occu = request('spouse_occu');
        $spouses->spouse_emp_name = request('spouse_emp_name');
        $spouses->spouse_emp_stat = request('spouse_emp_stat');
        $spouses->spouse_monthly_income = request('spouse_monthly_income');
        $spouses->save();

        $child = new Childrens();
        $child->member_id = request('members_id');
        $child->no_child = request('no_child');
        $child->no_child_contrib = request('no_child_contrib');
        $child->total_monthly_contrib = request('total_monthly_contrib');
        $child->no_child_work = request('no_child_work');
        $child->no_child_study = request('no_child_study');
        $child->no_child_notstudy = request('no_child_notstudy');
        $child->save();

        $emer = new Emergencies();
        $emer->member_id = request('members_id');
        $emer->emer_name = request('emer_name');
        $emer->emer_contact = request('emer_contact');
        $emer->emer_address = request('emer_address');
        $emer->save();

        $house = new Houses();
        $house->member_id = request('members_id');
        $house->duration_residency = request('duration_residency');
        $house->living_parents = request('living_parents');
        $house->house = request('house');
        $house->house_month = request('house_month');
        $house->lot = request('lot');
        $house->lot_month = request('lot_month');
        $house->house_yearly_income = request('house_yearly_income');
        $house->save();

        $beneficiariesData = $request->input('beneficiaries');
        $validBens = [];

        if ($request->filled('beneficiaries')) {
            foreach ($beneficiariesData as $index => $beneficiaryData) {
                // Check if all required fields are non-null
                if (
                    !is_null($beneficiaryData['ben_fname']) &&
                    !is_null($beneficiaryData['ben_mname']) &&
                    !is_null($beneficiaryData['ben_lname']) &&
                    !is_null($beneficiaryData['ben_dob']) &&
                    !is_null($beneficiaryData['ben_relationship'])
                ) {
                    // Add the valid index to the list
                    $validBens[] = $index;
                }
            }

            // Store data for valid indices in the database
            foreach ($validBens as $index) {
                $beneficiaryData = $beneficiariesData[$index];

                $beneficiaries = new Beneficiary();
                $beneficiaries->member_id = request('members_id');
                $beneficiaries->ben_fname = $beneficiaryData['ben_fname'];
                $beneficiaries->ben_mname = $beneficiaryData['ben_mname'];
                $beneficiaries->ben_lname = $beneficiaryData['ben_lname'];
                $beneficiaries->ben_suffix = $beneficiaryData['ben_suffix'] ?? null; // Allow ben_suffix to be null
                $beneficiaries->ben_dob = $beneficiaryData['ben_dob'];
                $beneficiaries->ben_relationship = $beneficiaryData['ben_relationship'];
                $beneficiaries->save();
            }
        }

        $members->save();
        return redirect('/view/' . $members->usercode);
    }

    public function view($usercode)
    {
        $members = Member::where('usercode', $usercode)->get();
        // Check if at least one member is found
        if ($members->isNotEmpty()) {
        // Get the id from the first member (assuming usercodes are unique)
            $id = $members->first()->id;

            $businesses = Businesses::where('member_id', $id)->get();
            $childrens = Childrens::where('member_id', $id)->get();
            $emergencies = Emergencies::where('member_id', $id)->get();
            $employments = Employments::where('member_id', $id)->get();
            $employers = Employers::where('member_id', $id)->get();
            $fathers = Fathers::where('member_id', $id)->get();
            $houses = Houses::where('member_id', $id)->get();
            $mothers = Mothers::where('member_id', $id)->get();
            $spouses = Spouses::where('member_id', $id)->get();
            $beneficiaries = Beneficiary::where('member_id', $id)->get(); 

            return view('members.view', [
                'members' => $members,
                'businesses' => $businesses,
                'childrens' => $childrens,
                'emergencies' => $emergencies,
                'employments' => $employments,
                'employers' => $employers,
                'fathers' => $fathers,
                'houses' => $houses,
                'mothers' => $mothers,
                'spouses' => $spouses,
                'beneficiaries' => $beneficiaries,
            ]);
        }
    }

    public function generatePDF($usercode)
    {
        $members = Member::where('usercode', $usercode)->get();
        // Check if at least one member is found
        if ($members->isNotEmpty()) {
        // Get the id from the first member (assuming usercodes are unique)
            $id = $members->first()->id;

            $businesses = Businesses::where('member_id', $id)->get();
            $childrens = Childrens::where('member_id', $id)->get();
            $emergencies = Emergencies::where('member_id', $id)->get();
            $employments = Employments::where('member_id', $id)->get();
            $employers = Employers::where('member_id', $id)->get();
            $fathers = Fathers::where('member_id', $id)->get();
            $houses = Houses::where('member_id', $id)->get();
            $mothers = Mothers::where('member_id', $id)->get();
            $spouses = Spouses::where('member_id', $id)->get();
            $beneficiaries = Beneficiary::where('member_id', $id)->get(); 

            $beneficiaries = Beneficiary::where('member_id', $id)->get();
            $data = ['members' => $members,
            'businesses' => $businesses,
            'childrens' => $childrens,
            'emergencies' => $emergencies,
            'employments' => $employments,
            'employers' => $employers,
            'fathers' => $fathers,
            'houses' => $houses,
            'mothers' => $mothers,
            'spouses' => $spouses,
            'beneficiaries' => $beneficiaries];

            // Create a new instance of Dompdf
            $options = new Options();
            $options->set('isHtml5ParserEnabled', true);
            $options->set('isPhpEnabled', true);
            $dompdf = new Dompdf($options);

            // Load HTML content
            $html = view('members.pdf_download.pdf_view', $data)->render();
            $htmlWithStyles = '<style>' . file_get_contents('C:\Users\Acer\membership\public\assets\membershipapplication\css\pdf.css') . '</style>' . $html;

            // Load HTML to Dompdf
            $dompdf->loadHtml($htmlWithStyles);
            $dompdf->setPaper('A4', 'Portrait');

            // Render PDF
            $dompdf->render();

            // Stream the file for download
            $dompdf->stream('membership_application.pdf', ['Attachment' => 0]);
        }
    }
}
