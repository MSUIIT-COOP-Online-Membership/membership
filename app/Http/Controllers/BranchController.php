<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Branch;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use RealRashid\SweetAlert\Facades\Alert;

class BranchController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $branches = Branch::all();
        return view('branches.index', compact('branches'));
    }

    /**
     * Show the form for creating a new branch.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('branches.create');
    }

    /**
     * Store a newly created branch in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'manager' => 'nullable|string|max:255',
                'address' => 'required|string|max:255',
                'tel_no' => 'nullable|string|max:255',
                'mobile_no' => 'nullable|string|max:255',
                'email' => 'nullable|email|max:255',
            ]);

            // Create a new branch instance and save to the database
            Branch::create([
                'name' => $request->input('name'),
                'manager' => $request->input('manager'),
                'address' => $request->input('address'),
                'tel_no' => $request->input('tel_no'),
                'mobile_no' => $request->input('mobile_no'),
                'email' => $request->input('email'),
            ]);

            Alert::success('Success!', 'Added branch successfully.');

            // Redirect to the branch index page or any other page after creation
            return redirect()->route('branches.index')->with('success', 'Branch added successfully!');
        } catch (\Exception $e) {
            Alert::error('Error', 'Error Message: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function show($id)
    {
        $branch = Branch::findOrFail($id);
        return view('branches.show', compact('branch'));
    }

    /**
     * Show the form for editing the specified branch.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $branch = Branch::findOrFail($id);
        return view('branches.edit', compact('branch'));
    }

    /**
     * Update the specified branch in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        try {
            // Validate the incoming request data
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'manager' => 'nullable|string|max:255',
                'address' => 'required|string',
                'tel_no' => 'nullable|string|max:255',
                'mobile_no' => 'nullable|string|max:255',
                'email' => 'nullable|email|max:255',
                // Add validation rules for other fields based on your Branch model
            ]);

            // Find the branch by ID and update its information
            $branch = Branch::findOrFail($id);
            $branch->update($validatedData);

            Alert::success('Success!', 'Updated branch successfully.');

            // Redirect to the branch index page or any other page after update
            return redirect()->route('branches.index')->with('success', 'Branch updated successfully!');
        } catch (\Exception $e) {
            Alert::error('Error', 'Error Message: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        try {
            $branch = Branch::findOrFail($id);
            $branch->delete();

            return response()->json(['success' => true, 'message' => 'Branch deleted successfully.']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error: ' . $e->getMessage()]);
        }
    }

}