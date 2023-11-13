<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Staff;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staffMembers = Staff::all();
        return view('staff.index', compact('staffMembers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('staff.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'lname' => 'required',
            'mname' => 'nullable',
            'fname' => 'required',
            'suffix' => 'nullable',
            'sex' => 'nullable',
            'civil_status' => 'nullable',
            'dob' => 'nullable|date',
            'age' => 'nullable|integer',
            'tel_no' => 'nullable',
            'mobile_no' => 'nullable',
            'email' => 'nullable|email',
            'present_address' => 'nullable',
            'position' => 'nullable',
            'id_photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle file upload
        if ($request->hasFile('id_photo')) {
            $image = $request->file('id_photo');
            $imageName = 'id_photo_' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/id_photos/'), $imageName);
            // Save the image name to the database
            $request->merge(['id_photo' => $imageName]);
        }

        // Create staff member
        Staff::create($request->only([
            'lname', 'mname', 'fname', 'suffix', 'sex', 'civil_status',
            'dob', 'age', 'tel_no', 'mobile_no', 'email',
            'present_address', 'position', 'id_photo',
        ]));

        return redirect()->route('staff.index')->with('success', 'Staff member created successfully.');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $staff = Staff::findOrFail($id);
        return view('staff.show', compact('staff'));
    }

}
