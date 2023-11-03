<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Premember;
use App\Models\Webinar_tool;

class Premembersform_controller extends Controller
{
    public function index(){
        return view('premembershipform.prememberform');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'fname' => 'nullable',
            'mname' => 'nullable',
            'lname' => 'nullable',
            'gender' => 'nullable',
            'date_of_birth' => 'nullable',
            'civil_status' => 'nullable',
            'email' => 'nullable',
            'telephone_number' => 'nullable',
            'mobile_number' => 'nullable',
            'facebook_account' => 'nullable',
            'present_address' => 'nullable',
            'ofw_family_member' => 'nullable',
            'occupation' => 'nullable',
            'tool_name' => 'required', 
            
        ]);

        $PrememberInfo = Premember::create($data);

        // Get the ID of the newly created Personal_info record
        $PrememberInfoId = $PrememberInfo->id;

        $webinarToolData = [
            'participant_id' => $PrememberInfoId,
            'tool_name' => $data['tool_name'],
        ];

        Webinar_tool::create($webinarToolData);

         return redirect(route('premembershipform.index'));
    }
}
