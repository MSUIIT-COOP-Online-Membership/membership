<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employment;
use App\Models\Member;
use RealRashid\SweetAlert\Facades\Alert;

class EmploymentController extends Controller
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
        $employments = Employment::all();
        return view('employments.index', compact('employments'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        $members = Member::all();
        return view('employments.create', compact('members'));
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
                'emp_stat' => 'nullable|string|max:255',
                'emp_type' => 'nullable|string|max:255',
                'profession' => 'nullable|string|max:255',
                'emp_others' => 'nullable|string|max:255',
                'business_type' => 'nullable|string|max:255',
                'asset_size' => 'nullable|string|max:255',
            ]);

            // Create a new employment
            Employment::create($request->all());
            
            Alert::success('Success!', 'Added employment entry successfully.');

            return redirect()->route('employments.index')->with('success', 'Employment created successfully');
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
        $employment = Employment::findOrFail($id);
        return view('employments.show', compact('employment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employment = Employment::findOrFail($id);
        $members = Member::all();

        return view('employments.edit', compact('employment', 'members'));
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
                'emp_stat' => 'nullable|string|max:255',
                'emp_type' => 'nullable|string|max:255',
                'profession' => 'nullable|string|max:255',
                'emp_others' => 'nullable|string|max:255',
                'business_type' => 'nullable|string|max:255',
                'asset_size' => 'nullable|string|max:255',
            ]);

            // Update the employment
            $employment = Employment::findOrFail($id);
            $employment->update($request->all());

            Alert::success('Success!', 'Updated employment entry successfully.');

            return redirect()->route('employments.index')->with('success', 'Employment updated successfully');
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
        $employment = Employment::findOrFail($id);
        $employment->delete();

         return response()->json(['success' => true, 'message' => 'Employment deleted successfully.']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error: ' . $e->getMessage()]);
        }
    }
}
