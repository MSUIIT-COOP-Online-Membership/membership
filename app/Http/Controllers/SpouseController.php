<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Spouse;
use App\Models\Member;
use RealRashid\SweetAlert\Facades\Alert;

class SpouseController extends Controller
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
        $spouses = Spouse::all();
        return view('spouses.index', compact('spouses'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        $members = Member::all();
        return view('spouses.create', compact('members'));
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
                'spouse_fname' => 'nullable|string|max:255',
                'spouse_mname' => 'nullable|string|max:255',
                'spouse_lname' => 'nullable|string|max:255',
                'spouse_suffix' => 'nullable|string|max:255',
                'spouse_dob' => 'nullable|date',
                'spouse_age' => 'nullable|integer',
                'spouse_contact' => 'nullable|string|max:255',
                'spouse_occu' => 'nullable|string|max:255',
                'spouse_emp_name' => 'nullable|string|max:255',
                'spouse_emp_stat' => 'nullable|string|max:255',
                'spouse_monthly_income' => 'nullable|string|max:255',
            ]);

            // Create a new spouse
            Spouse::create($request->all());
            
            Alert::success('Success!', 'Added spouse entry successfully.');

            return redirect()->route('spouses.index')->with('success', 'Spouse created successfully');
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
        $spouse = Spouse::findOrFail($id);
        return view('spouses.show', compact('spouse'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $spouse = Spouse::findOrFail($id);
        $members = Member::all();

        return view('spouses.edit', compact('spouse', 'members'));
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
                'spouse_fname' => 'nullable|string|max:255',
                'spouse_mname' => 'nullable|string|max:255',
                'spouse_lname' => 'nullable|string|max:255',
                'spouse_suffix' => 'nullable|string|max:255',
                'spouse_dob' => 'nullable|date',
                'spouse_age' => 'nullable|integer',
                'spouse_contact' => 'nullable|string|max:255',
                'spouse_occu' => 'nullable|string|max:255',
                'spouse_emp_name' => 'nullable|string|max:255',
                'spouse_emp_stat' => 'nullable|string|max:255',
                'spouse_monthly_income' => 'nullable|string|max:255',
            ]);

            // Update the spouse
            $spouse = Spouse::findOrFail($id);
            $spouse->update($request->all());

            Alert::success('Success!', 'Updated spouse entry successfully.');

            return redirect()->route('spouses.index')->with('success', 'Spouse updated successfully');
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
        $spouse = Spouse::findOrFail($id);
        $spouse->delete();

         return response()->json(['success' => true, 'message' => 'Spouse deleted successfully.']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error: ' . $e->getMessage()]);
        }
    }
}
