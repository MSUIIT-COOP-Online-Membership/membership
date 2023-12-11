<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mother;
use App\Models\Member;
use RealRashid\SweetAlert\Facades\Alert;

class MotherController extends Controller
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
        $mothers = Mother::all();
        return view('mothers.index', compact('mothers'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        $members = Member::all();
        return view('mothers.create', compact('members'));
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
            // Validate the form data
            $request->validate([
                'member_id' => 'required|exists:members,id',
                'mother_fname' => 'nullable|string|max:255',
                'mother_mname' => 'nullable|string|max:255',
                'mother_lname' => 'nullable|string|max:255',
                'mother_suffix' => 'nullable|string|max:255',
                'mother_dob' => 'nullable|date',
                'mother_age' => 'nullable|integer',
                'mother_contact' => 'nullable|string|max:255',
                'mother_occu' => 'nullable|string|max:255',
            ]);

            // Create a new mother
            Mother::create($request->all());
            
            Alert::success('Success!', 'Added mother entry successfully.');

            return redirect()->route('mothers.index')->with('success', 'Mother created successfully');
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
        $mother = Mother::findOrFail($id);
        return view('mothers.show', compact('mother'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mother = Mother::findOrFail($id);
        $members = Member::all();

        return view('mothers.edit', compact('mother', 'members'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            // Validate the form data
            $request->validate([
                'member_id' => 'nullable|exists:members,id',
                'mother_fname' => 'nullable|string|max:255',
                'mother_mname' => 'nullable|string|max:255',
                'mother_lname' => 'nullable|string|max:255',
                'mother_suffix' => 'nullable|string|max:255',
                'mother_dob' => 'nullable|date',
                'mother_age' => 'nullable|integer',
                'mother_contact' => 'nullable|string|max:255',
                'mother_occu' => 'nullable|string|max:255',
            ]);

            // Update the mother
            $mother = Mother::findOrFail($id);
            $mother->update($request->all());

            Alert::success('Success!', 'Updated mother entry successfully.');

            return redirect()->route('mothers.index')->with('success', 'Mother updated successfully');
        } catch (\Exception $e) {
            Alert::error('Error', 'Error Message: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
        $mother = Mother::findOrFail($id);
        $mother->delete();

         return response()->json(['success' => true, 'message' => 'Mother deleted successfully.']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error: ' . $e->getMessage()]);
        }
    }
}
