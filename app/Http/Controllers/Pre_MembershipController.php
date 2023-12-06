<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\Branch;
use App\Models\Evaluation;
use RealRashid\SweetAlert\Facades\Alert;


class Pre_MembershipController extends Controller
{
    public function index(){
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
            'present_address' => 'nullable|string|max:255',
            'usercode' => 'nullable|string|size:8',
            'occupation' => 'nullable|string|max:255',
            'ofw_family_member' => 'nullable|string|max:255',
            'latitude' => 'nullable|numeric', //new
            'longitude' => 'nullable|numeric', //new

           
            // evaluation data
            'branches' => 'nullable|array',
            'q_one' => 'nullable|string',
            'q_two' => 'nullable|string',
            'q_three' => 'nullable|string',
            'q_four' => 'nullable|string',
            'q_five' => 'nullable|string',
            'q_six' => 'nullable|string',
            'q_seven' => 'nullable|string',
            'q_eight' => 'nullable|string',
            'q_nine' => 'nullable|string',
            'q_ten' => 'nullable|string',
            'score' => 'nullable|integer',
            'pass_status' => 'nullable|string'
        ]);

        // Generate random usercode if not provided in the request
        $data['usercode'] = $data['usercode'] ?? Str::random(8);
        $PrememberInfo = Member::create($data);

         // Get the ID of the newly created Personal_info record
         $PrememberInfoId = $PrememberInfo->id;

        // Debugging statements
        
           // Create an evaluation for each selected branch
    // Create an evaluation for each selected branch
foreach ($data['branches'] as $branchId) {
    $evaluationData = [
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
    ];

    try {
        Evaluation::create($evaluationData);
    } catch (\Exception $e) {
        dd($e->getMessage());
    }
}

        return redirect(route('premembershipform.index'));
    }
}
