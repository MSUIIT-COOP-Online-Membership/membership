<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\Member;
use App\Models\Branch;
use App\Models\Staff;
use App\Models\Payment;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $applications = Application::all();
        return view('applications.index', compact('applications'));
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
        $staffMembers = Staff::all();
        $payments = Payment::all();

        return view('applications.create', compact('members', 'branches', 'staffMembers', 'payments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required',
            'status' => 'required',
            'member_id' => 'required|exists:members,id',
            'branch_id' => 'required|exists:branches,id',
            'approved_by' => 'required|exists:staff,id',
            'payment_id' => 'required|exists:payments,id',
        ]);

        Application::create($request->only([
            'type', 'status', 'member_id', 'branch_id', 'approved_by', 'payment_id',
        ]));

        return redirect()->route('applications.index')->with('success', 'Application created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $application = Application::findOrFail($id);
        return view('applications.show', compact('application'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $application = Application::findOrFail($id);
        $members = Member::all();
        $branches = Branch::all();
        $staffMembers = Staff::all();
        $payments = Payment::all();

        return view('applications.edit', compact('application', 'members', 'branches', 'staffMembers', 'payments'));
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
        $request->validate([
            'type' => 'required',
            'status' => 'required',
            'member_id' => 'required|exists:members,id',
            'branch_id' => 'required|exists:branches,id',
            'approved_by' => 'required|exists:staff,id',
            'payment_id' => 'required|exists:payments,id',
        ]);

        $application = Application::findOrFail($id);
        $application->update($request->only([
            'type', 'status', 'member_id', 'branch_id', 'approved_by', 'payment_id',
        ]));

        return redirect()->route('applications.index')->with('success', 'Application updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $application = Application::findOrFail($id);
        $application->delete();

        return redirect()->route('applications.index')->with('success', 'Application deleted successfully.');
    }
}
