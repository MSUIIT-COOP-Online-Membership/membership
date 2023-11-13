<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evaluation;
use App\Models\Member;
use App\Models\Branch;

class EvaluationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $evaluations = Evaluation::paginate(10); // Change 10 to the number of items you want per page
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
            'score' => 'required|integer',
            'pass_status' => 'required|in:Pass,Fail',
        ]);

        // Create a new evaluation
        Evaluation::create($request->all());

        return redirect()->route('evaluations.index')->with('success', 'Evaluation created successfully');
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
        return view('evaluations.edit', compact('evaluation'));
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
            'score' => 'required|integer',
            'pass_status' => 'required|in:Pass,Fail',
        ]);

        // Update the evaluation
        $evaluation = Evaluation::findOrFail($id);
        $evaluation->update($request->all());

        return redirect()->route('evaluations.index')->with('success', 'Evaluation updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $evaluation = Evaluation::findOrFail($id);
        $evaluation->delete();

        return redirect()->route('evaluations.index')->with('success', 'Evaluation deleted successfully');
    }
}
