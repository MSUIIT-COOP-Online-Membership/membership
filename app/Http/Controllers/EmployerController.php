<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employer;
use App\Models\Member;
use RealRashid\SweetAlert\Facades\Alert;

class EmployerController extends Controller
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
        $employers = Employer::all();
        return view('employers.index', compact('employers'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        $members = Member::all();
        return view('employers.create', compact('members'));
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
                'employer_name' => 'nullable|string|max:255',
                'service_length' => 'nullable|string|max:255',
                'employer_status' => 'nullable|string|max:255',
                'employer_address' => 'nullable|string|max:255',
                'employer_contact' => 'nullable|string|max:255',
                'monthly_salary' => 'nullable|string|max:255',
            ]);

            // Create a new employer
            Employer::create($request->all());
            
            Alert::success('Success!', 'Added employer entry successfully.');

            return redirect()->route('employers.index')->with('success', 'Employer created successfully');
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
        $employer = Employer::findOrFail($id);
        return view('employers.show', compact('employer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employer = Employer::findOrFail($id);
        $members = Member::all();

        return view('employers.edit', compact('employer', 'members'));
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
                'employer_name' => 'nullable|string|max:255',
                'service_length' => 'nullable|string|max:255',
                'employer_status' => 'nullable|string|max:255',
                'employer_address' => 'nullable|string|max:255',
                'employer_contact' => 'nullable|string|max:255',
                'monthly_salary' => 'nullable|string|max:255',
            ]);

            // Update the employer
            $employer = Employer::findOrFail($id);
            $employer->update($request->all());

            Alert::success('Success!', 'Updated employer entry successfully.');

            return redirect()->route('employers.index')->with('success', 'Employer updated successfully');
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
        $employer = Employer::findOrFail($id);
        $employer->delete();

         return response()->json(['success' => true, 'message' => 'Employer deleted successfully.']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error: ' . $e->getMessage()]);
        }
    }
}
