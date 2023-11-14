<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Staff;
use RealRashid\SweetAlert\Facades\Alert;

class StaffController extends Controller
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
        try {
            $request->validate([
                'id_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:25000',
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
            ]);

            // Handle file upload
            if ($request->hasFile('id_photo')) {
                $image = $request->file('id_photo');
                $imageName = 'id_photo_' . time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images/id_photos/'), $imageName);
                $request->merge(['id_photo' => $imageName]);
            }

            // Create staff member

            Staff::create([
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
                'email' => $request->input('email'),
                'present_address' => $request->input('present_address'),
                'position' => $request->input('position'),
            ]);

            Alert::success('Success!', 'Added staff member successfully.');

            return redirect()->route('staff.index')->with('success', 'Staff member added successfully.');
        } catch (\Exception $e) {
            Alert::error('Error', 'Error Message: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
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

    public function edit($id)
    {
        $staff = Staff::findOrFail($id);
        return view('staff.edit', compact('staff'));
    }

    public function update(Request $request, $id)
{
    try {
        $request->validate([
            'id_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:25000',
            'lname' => 'nullable',
            'mname' => 'nullable',
            'fname' => 'nullable',
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
        ]);

            // Find the staff by ID
            $staff = Staff::find($id);

            if ($request->hasFile('id_photo')) {
                $image = $request->file('id_photo');
                $imageName = 'id_photo_' . time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images/id_photos/'), $imageName);
                $staff->id_photo = $imageName;
            }

            // Update staff member
            $staff->save();

            Alert::success('Success!', 'Updated staff member successfully.');

            // Redirect to the staff index page or any other page after update
            return redirect()->route('staff.index')->with('success', 'Staff member updated successfully!');
        } catch (\Exception $e) {
            Alert::error('Error', 'Error Message: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function destroy($id)
    {
        try {
            $staff = Staff::findOrFail($id);
            $staff->delete();

            return response()->json(['success' => true, 'message' => 'Staff member deleted successfully.']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error: ' . $e->getMessage()]);
        }
    }

}
