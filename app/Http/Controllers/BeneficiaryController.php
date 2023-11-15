<?php

namespace App\Http\Controllers;

use App\Models\Beneficiary;
use Illuminate\Http\Request;
use App\Models\Member;
use RealRashid\SweetAlert\Facades\Alert;

class BeneficiaryController extends Controller
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
        $beneficiaries = Beneficiary::all();
        return view('beneficiaries.index', compact('beneficiaries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $members = Member::all();

        return view('beneficiaries.create', compact('members'));
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
                'ben_fname' => 'nullable|string|max:255',
                'ben_mname' => 'nullable|string|max:255',
                'ben_lname' => 'nullable|string|max:255',
                'ben_suffix' => 'nullable|string|max:255',
                'ben_dob' => 'nullable|date',
                'ben_relationship' => 'nullable|string|max:255',
            ]);

            // Create a new evaluation
            Beneficiary::create($request->all());
            
            Alert::success('Success!', 'Added beneficiary successfully.');

            return redirect()->route('beneficiaries.index')->with('success', 'Beneficiary created successfully');
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
        $beneficiary = Beneficiary::findOrFail($id);
        return view('beneficiaries.show', compact('beneficiary'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $beneficiary = Beneficiary::findOrFail($id);
        $members = Member::all();

        return view('beneficiaries.edit', compact('members', 'beneficiary'));
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
            // Validate the incoming request data
            $request->validate([
                'member_id' => 'nullable|exists:members,id',
                'ben_fname' => 'nullable|string|max:255',
                'ben_mname' => 'nullable|string|max:255',
                'ben_lname' => 'nullable|string|max:255',
                'ben_suffix' => 'nullable|string|max:255',
                'ben_dob' => 'nullable|date',
                'ben_relationship' => 'nullable|string|max:255',
            ]);

            // Update the evaluation
            $beneficiary = Beneficiary::findOrFail($id);
            $beneficiary->update($request->all());

            Alert::success('Success!', 'Updated beneficiary successfully.');

            return redirect()->route('beneficiaries.index')->with('success', 'Beneficiary updated successfully');
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
        $beneficiary = Beneficiary::findOrFail($id);
        $beneficiary->delete();

         return response()->json(['success' => true, 'message' => 'Beneficiary deleted successfully.']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error: ' . $e->getMessage()]);
        }
    }
}
