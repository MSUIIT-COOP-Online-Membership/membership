<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Father;
use App\Models\Member;
use RealRashid\SweetAlert\Facades\Alert;

class FatherController extends Controller
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
        $fathers = Father::all();
        return view('fathers.index', compact('fathers'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        $members = Member::all();
        return view('fathers.create', compact('members'));
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
                'father_fname' => 'nullable|string|max:255',
                'father_mname' => 'nullable|string|max:255',
                'father_lname' => 'nullable|string|max:255',
                'father_suffix' => 'nullable|string|max:255',
                'father_dob' => 'nullable|date',
                'father_age' => 'nullable|integer',
                'father_contact' => 'nullable|string|max:255',
                'father_occu' => 'nullable|string|max:255',
            ]);

            // Create a new father
            Father::create($request->all());
            
            Alert::success('Success!', 'Added father entry successfully.');

            return redirect()->route('fathers.index')->with('success', 'Father created successfully');
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
        $father = Father::findOrFail($id);
        return view('fathers.show', compact('father'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $father = Father::findOrFail($id);
        $members = Member::all();

        return view('fathers.edit', compact('father', 'members'));
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
                'father_fname' => 'nullable|string|max:255',
                'father_mname' => 'nullable|string|max:255',
                'father_lname' => 'nullable|string|max:255',
                'father_suffix' => 'nullable|string|max:255',
                'father_dob' => 'nullable|date',
                'father_age' => 'nullable|integer',
                'father_contact' => 'nullable|string|max:255',
                'father_occu' => 'nullable|string|max:255',
            ]);

            // Update the father
            $father = Father::findOrFail($id);
            $father->update($request->all());

            Alert::success('Success!', 'Updated father entry successfully.');

            return redirect()->route('fathers.index')->with('success', 'Father updated successfully');
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
        $father = Father::findOrFail($id);
        $father->delete();

         return response()->json(['success' => true, 'message' => 'Father deleted successfully.']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error: ' . $e->getMessage()]);
        }
    }
}
