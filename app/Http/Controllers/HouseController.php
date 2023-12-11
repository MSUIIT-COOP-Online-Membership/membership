<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\House;
use App\Models\Member;
use RealRashid\SweetAlert\Facades\Alert;

class HouseController extends Controller
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
        $houses = House::all();
        return view('houses.index', compact('houses'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        $members = Member::all();
        return view('houses.create', compact('members'));
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
                'duration_residency' => 'nullable|string|max:255',
                'living_parents' => 'nullable|string|max:255',
                'house' => 'nullable|string|max:255',
                'house_month' => 'nullable|integer',
                'lot' => 'nullable|string|max:255',
                'lot_month' => 'nullable|integer',
                'house_yearly_income' => 'nullable|string|max:255',
            ]);

            // Create a new house
            House::create($request->all());
            
            Alert::success('Success!', 'Added house entry successfully.');

            return redirect()->route('houses.index')->with('success', 'House created successfully');
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
        $house = House::findOrFail($id);
        return view('houses.show', compact('house'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $house = House::findOrFail($id);
        $members = Member::all();

        return view('houses.edit', compact('house', 'members'));
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
                'duration_residency' => 'nullable|string|max:255',
                'living_parents' => 'nullable|string|max:255',
                'house' => 'nullable|string|max:255',
                'house_month' => 'nullable|integer',
                'lot' => 'nullable|string|max:255',
                'lot_month' => 'nullable|integer',
                'house_yearly_income' => 'nullable|string|max:255',
            ]);

            // Update the house
            $house = House::findOrFail($id);
            $house->update($request->all());

            Alert::success('Success!', 'Updated house entry successfully.');

            return redirect()->route('houses.index')->with('success', 'House updated successfully');
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
        $house = House::findOrFail($id);
        $house->delete();

         return response()->json(['success' => true, 'message' => 'House deleted successfully.']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error: ' . $e->getMessage()]);
        }
    }
}
