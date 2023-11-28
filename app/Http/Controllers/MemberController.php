<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
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
                'tin' => $request->input('tin'),
                'educational_attainment' => $request->input('educational_attainment'), 
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
