<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\Beneficiary;
use Dompdf\Dompdf;
use Dompdf\Options;

class MembershipApplication extends Controller
{
    public function index()
    {
        return view('members.code');
    }

    public function code(Request $request)
    {
        $code = $request->input('code');
        $members = Member::find($code);

        if (!$members) {
            return view('members.index')->with('error', 'Item not found.');
        }

        return view('members.membershipform', ['members' => $members]);
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

    public function edit(Request $request, $id)
    {
        $members = Member::find($id);

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
            'ben_fname' => $request->input('ben_fname'),
            'ben_mname' => $request->input('ben_mname'),
            'ben_lname' => $request->input('ben_lname'),
            'ben_suffix' => $request->input('ben_suffix'),
            'ben_dob' => $request->input('ben_dob'),
            'ben_relationship' => $request->input('ben_relationship'),
            'app_date' => $request->input('app_date')

        ]);

        $beneficiariesData = $request->input('beneficiaries');
        $validIndices = [];

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
                    $validIndices[] = $index;
                }
            }

            // Store data for valid indices in the database
            foreach ($validIndices as $index) {
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
        return redirect('/view/' . $members->id);
    }

    public function view(int $id)
    {
        $members = Member::findOrfail($id);
        $beneficiaries = Beneficiary::where('member_id', $id)->get();
        return view('members.view', ['members' => $members], ['beneficiaries' => $beneficiaries]);
    }

    public function generatePDF(int $id)
    {
        $members = Member::findOrFail($id);
        $beneficiaries = Beneficiary::where('member_id', $id)->get();
        $data = ['members' => $members, 'beneficiaries' => $beneficiaries];

        // Create a new instance of Dompdf
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);
        $dompdf = new Dompdf($options);

        // Load HTML content
        $html = view('members.pdf_download.pdf_view', $data)->render();

        // Load HTML to Dompdf
        $dompdf->loadHtml($html);

        // Set paper size and orientation
        $dompdf->setPaper('A4', 'portrait');

        // Render PDF
        $dompdf->render();

        // Stream the file for download
        $dompdf->stream('membership_application.pdf', ['Attachment' => 0]);
    }
}
