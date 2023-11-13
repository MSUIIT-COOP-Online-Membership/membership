<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Member;
use App\Models\Branch;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $appointments = Appointment::all();
        return view('appointments.index', compact('appointments'));
    }

    public function getAppointments()
    {
        $appointments = Appointment::all();
        return view('appointments.calendar', compact('appointments'));
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
        return view('appointments.create', compact('members', 'branches'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'member_id' => 'nullable|exists:members,id',
            'branch_id' => 'required',
            'subject' => 'required',
            'date' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'required',
            'status' => 'required',
        ]);

        // Store logic
        Appointment::create($request->all());

        return redirect()->route('appointments.index')
            ->with('success', 'Appointment created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $appointment = Appointment::find($id);

        if (!$appointment) {
            return redirect()->route('appointments.index')
                ->with('error', 'Appointment not found');
        }

        return view('appointments.show', compact('appointment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $appointment = Appointment::find($id);
        $members = Member::all();
        $branches = Branch::all();
        return view('appointments.edit', compact('appointment', 'members', 'branches'));
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
        // Validation
        $request->validate([
            'member_id' => 'nullable|exists:members,id',
            'branch_id' => 'required',
            'subject' => 'required',
            'date' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'required',
            'status' => 'required',
        ]);

        // Find the appointment
        $appointment = Appointment::find($id);

        if (!$appointment) {
            return redirect()->route('appointments.index')
                ->with('error', 'Appointment not found');
        }

        // Update the appointment
        $appointment->update($request->all());

        return redirect()->route('appointments.index')
            ->with('success', 'Appointment updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Deletion logic here
    }
}
