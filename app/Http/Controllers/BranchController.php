<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Branch;

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
        $branches = Branch::paginate();

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
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'manager' => 'nullable|string|max:255',
            'address' => 'required|string',
            'tel_no' => 'nullable|string|max:20',
            'mobile_no' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            // Add validation rules for other fields based on your Branch model
        ]);

        // Create a new branch instance and save to the database
        Branch::create($validatedData);

        // Redirect to the branch index page or any other page after creation
        return redirect()->route('branches.index')->with('success', 'Branch added successfully!');
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
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'manager' => 'nullable|string|max:255',
            'address' => 'required|string',
            'tel_no' => 'nullable|string|max:20',
            'mobile_no' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            // Add validation rules for other fields based on your Branch model
        ]);

        // Find the branch by ID and update its information
        $branch = Branch::findOrFail($id);
        $branch->update($validatedData);

        // Redirect to the branch index page or any other page after update
        return redirect()->route('branches.index')->with('success', 'Branch updated successfully!');
    }

    public function destroy(Branch $branch)
    {
        $branch->delete();

        return redirect()->route('branches.index')->with('success', 'Branch deleted successfully!');
    }

}