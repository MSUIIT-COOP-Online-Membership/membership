<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Child;
use App\Models\Member;
use RealRashid\SweetAlert\Facades\Alert;

class ChildController extends Controller
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
        $children = Child::all();
        return view('children.index', compact('children'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        $members = Member::all();
        return view('children.create', compact('members'));
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
                'no_child' => 'nullable|integer',
                'no_child_contrib' => 'nullable|integer',
                'total_monthly_contrib' => 'nullable|string|max:255',
                'no_child_work' => 'nullable|integer',
                'no_child_study' => 'nullable|integer',
                'no_child_notstudy' => 'nullable|integer',
            ]);

            // Create a new child
            Child::create($request->all());
            
            Alert::success('Success!', 'Added child entry successfully.');

            return redirect()->route('children.index')->with('success', 'Child created successfully');
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
        $child = Child::findOrFail($id);
        return view('children.show', compact('child'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $child = Child::findOrFail($id);
        $members = Member::all();

        return view('children.edit', compact('child', 'members'));
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
                'no_child' => 'nullable|integer',
                'no_child_contrib' => 'nullable|integer',
                'total_monthly_contrib' => 'nullable|string|max:255',
                'no_child_work' => 'nullable|integer',
                'no_child_study' => 'nullable|integer',
                'no_child_notstudy' => 'nullable|integer',
            ]);

            // Update the child
            $child = Child::findOrFail($id);
            $child->update($request->all());

            Alert::success('Success!', 'Updated child entry successfully.');

            return redirect()->route('children.index')->with('success', 'Child updated successfully');
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
        $child = Child::findOrFail($id);
        $child->delete();

         return response()->json(['success' => true, 'message' => 'Child deleted successfully.']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error: ' . $e->getMessage()]);
        }
    }
}
