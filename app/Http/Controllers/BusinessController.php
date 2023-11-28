<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Business;
use App\Models\Member;
use RealRashid\SweetAlert\Facades\Alert;

class BusinessController extends Controller
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
        $businesses = Business::all();
        return view('businesses.index', compact('businesses'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        $members = Member::all();
        return view('businesses.create', compact('members'));
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
                'business_name' => 'nullable|string|max:255',
                'business_tin' => 'nullable|integer',
                'business_address' => 'nullable|string|max:255',
                'business_contact' => 'nullable|string|max:255',
                'op_duration_year' => 'nullable|integer',
                'op_duration_month' => 'nullable|integer',
                'no_workers' => 'nullable|integer',
                'yearly_income' => 'nullable|string|max:255',
                'source_income' => 'nullable|string|max:255',
                'monthly_income' => 'nullable|string|max:255',
            ]);

            // Create a new business
            Business::create($request->all());
            
            Alert::success('Success!', 'Added business entry successfully.');

            return redirect()->route('businesses.index')->with('success', 'Business created successfully');
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
        $business = Business::findOrFail($id);
        return view('businesses.show', compact('business'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $business = Business::findOrFail($id);
        $members = Member::all();

        return view('businesses.edit', compact('business', 'members'));
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
                'business_name' => 'nullable|string|max:255',
                'business_tin' => 'nullable|integer',
                'business_address' => 'nullable|string|max:255',
                'business_contact' => 'nullable|string|max:255',
                'op_duration_year' => 'nullable|integer',
                'op_duration_month' => 'nullable|integer',
                'no_workers' => 'nullable|integer',
                'yearly_income' => 'nullable|string|max:255',
                'source_income' => 'nullable|string|max:255',
                'monthly_income' => 'nullable|string|max:255',
            ]);

            // Update the business
            $business = Business::findOrFail($id);
            $business->update($request->all());

            Alert::success('Success!', 'Updated business entry successfully.');

            return redirect()->route('businesses.index')->with('success', 'Business updated successfully');
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
        $business = Business::findOrFail($id);
        $business->delete();

         return response()->json(['success' => true, 'message' => 'Business deleted successfully.']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error: ' . $e->getMessage()]);
        }
    }
}
