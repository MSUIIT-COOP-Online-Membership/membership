<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Member;
use App\Models\Branch;
use RealRashid\SweetAlert\Facades\Alert;
use Carbon\Carbon;

class AppointmentController extends Controller
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
        $appointments = Appointment::all();
        return view('appointments.index', compact('appointments'));
    }

    // public function getAppointments()
    // {
    //     $appointments = Appointment::all();
    //     return view('appointments.calendar', compact('appointments'));
    // }

    public function getAppointments()
    {
        $appointments = Appointment::all();
    
        $today = Carbon::today();
    
        $bookedAppointments = $appointments->filter(function ($appointment) use ($today) {
            $appointmentDate = Carbon::parse($appointment->date); // Ensure it's a Carbon instance
            return $appointment->status === 'Booked' && $appointmentDate->isSameDay($today);
        });
        
    
        $availableAppointments = $appointments->where('status', 'Available');
        $upcomingAppointments = $appointments->where('status', 'Booked');
    
        return view('appointments.calendar', compact('bookedAppointments', 'availableAppointments', 'upcomingAppointments', 'appointments'));
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
        try {
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

        Alert::success('Success!', 'Added appointment successfully.');

        return redirect()->route('appointments.index')
            ->with('success', 'Appointment created successfully');
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
        try {
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

        Alert::success('Success!', 'Updated appointment successfully.');

        return redirect()->route('appointments.index')
            ->with('success', 'Appointment updated successfully');
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
            $appointment = Appointment::findOrFail($id);
            $appointment->delete();

            return response()->json(['success' => true, 'message' => 'Appointment deleted successfully.']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error: ' . $e->getMessage()]);
        }
    }

    
}
