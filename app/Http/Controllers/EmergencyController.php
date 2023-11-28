<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Emergency;
use App\Models\Member;
use RealRashid\SweetAlert\Facades\Alert;

class EmergencyController extends Controller
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
        $emergencies = Emergency::all();
        return view('emergencies.index', compact('emergencies'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        $members = Member::all();
        return view('emergencies.create', compact('members'));
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
                'emer_name' => 'nullable|string|max:255',
                'emer_contact' => 'nullable|string|max:255',
                'emer_address' => 'nullable|string|max:255',
            ]);

            // Create a new emergency
            Emergency::create($request->all());
            
            Alert::success('Success!', 'Added emergency entry successfully.');

            return redirect()->route('emergencies.index')->with('success', 'Emergency created successfully');
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
        $emergency = Emergency::findOrFail($id);
        return view('emergencies.show', compact('emergency'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $emergency = Emergency::findOrFail($id);
        $members = Member::all();

        return view('emergencies.edit', compact('emergency', 'members'));
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
                'emer_name' => 'nullable|string|max:255',
                'emer_contact' => 'nullable|string|max:255',
                'emer_address' => 'nullable|string|max:255',
            ]);

            // Update the emergency
            $emergency = Emergency::findOrFail($id);
            $emergency->update($request->all());

            Alert::success('Success!', 'Updated emergency entry successfully.');

            return redirect()->route('emergencies.index')->with('success', 'Emergency updated successfully');
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
        $emergency = Emergency::findOrFail($id);
        $emergency->delete();

         return response()->json(['success' => true, 'message' => 'Emergency deleted successfully.']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error: ' . $e->getMessage()]);
        }
    }
}
