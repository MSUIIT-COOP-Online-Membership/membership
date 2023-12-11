<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evaluation;
use App\Models\Member;
use App\Models\Branch;
use RealRashid\SweetAlert\Facades\Alert;

class EvaluationController extends Controller
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
        $evaluations = Evaluation::all();
        return view('evaluations.index', compact('evaluations'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        $members = Member::all();
        $branches = Branch::all();
        return view('evaluations.create', compact('members', 'branches'));
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
                'branch_id' => 'required|exists:branches,id',
                'q_one' => 'required|string',
                'q_two' => 'required|string',
                'q_three' => 'required|string',
                'q_four' => 'required|string',
                'q_five' => 'required|string',
                'q_six' => 'required|string',
                'q_seven' => 'required|string',
                'q_eight' => 'required|string',
                'q_nine' => 'required|string',
                'q_ten' => 'required|string',
                'score' => 'nullable|integer',
                'pass_status' => 'nullable|string',
            ]);

            // Create a new evaluation
            Evaluation::create($request->all());
            
            Alert::success('Success!', 'Added evaluation entry successfully.');

            return redirect()->route('evaluations.index')->with('success', 'Evaluation created successfully');
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
        $evaluation = Evaluation::findOrFail($id);
        return view('evaluations.show', compact('evaluation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $evaluation = Evaluation::findOrFail($id);
        $members = Member::all();
        $branches = Branch::all();

        return view('evaluations.edit', compact('evaluation', 'members', 'branches'));
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
                'branch_id' => 'nullable|exists:branches,id',
                'q_one' => 'required|string',
                'q_two' => 'required|string',
                'q_three' => 'required|string',
                'q_four' => 'required|string',
                'q_five' => 'required|string',
                'q_six' => 'required|string',
                'q_seven' => 'required|string',
                'q_eight' => 'required|string',
                'q_nine' => 'required|string',
                'q_ten' => 'required|string',
                'score' => 'nullable|integer',
                'pass_status' => 'nullable|string',
            ]);

            // Update the evaluation
            $evaluation = Evaluation::findOrFail($id);
            $evaluation->update($request->all());

            Alert::success('Success!', 'Updated evaluation entry successfully.');

            return redirect()->route('evaluations.index')->with('success', 'Evaluation updated successfully');
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
        $evaluation = Evaluation::findOrFail($id);
        $evaluation->delete();

         return response()->json(['success' => true, 'message' => 'Evaluation deleted successfully.']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error: ' . $e->getMessage()]);
        }
    }
}
