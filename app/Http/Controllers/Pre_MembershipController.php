<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use RealRashid\SweetAlert\Facades\Alert;


class Pre_MembershipController extends Controller
{
    public function index(){
        return view('guest.premembershipform');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
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
            'present_address' => 'nullable|string|max:255',    
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
