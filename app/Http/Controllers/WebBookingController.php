<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WebBooking;
use App\Models\Webinar;
use App\Models\Member;
use RealRashid\SweetAlert\Facades\Alert;

class WebBookingController extends Controller
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
        $webBookings = WebBooking::all();
        return view('webbookings.index', compact('webBookings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $members = Member::all();
        $webinars = Webinar::all();

        return view('webbookings.create', compact('members', 'webinars'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $request->validate([
                'member_id' => 'required|exists:members,id',
                'web_id' => 'required|exists:webinars,id',
                'status' => 'required|string',
            ]);

            WebBooking::create($request->all());

            Alert::success('Success!', 'Added webinar booking successfully.');

            return redirect()->route('webbookings.index')->with('success', 'Web Booking created successfully.');
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
        $webBooking = WebBooking::findOrFail($id);
        return view('webbookings.show', compact('webBooking'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $webBooking = WebBooking::findOrFail($id);
        $members = Member::all();
        $webinars = Webinar::all();

        return view('webbookings.edit', compact('webBooking', 'members', 'webinars'));
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
                'member_id' => 'required|exists:members,id',
                'web_id' => 'required|exists:webinars,id',
                'status' => 'required|string',
            ]);

            $webBooking = WebBooking::findOrFail($id);
            $webBooking->update($request->all());

            Alert::success('Success!', 'Updated webinar booking successfully.');

            return redirect()->route('webbookings.index')->with('success', 'Web Booking updated successfully.');
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
            $webBooking = WebBooking::findOrFail($id);
            $webBooking->delete();

            return response()->json(['success' => true, 'message' => 'Webinar booking deleted successfully.']);
        } catch (\Exception $e) {
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error: ' . $e->getMessage()]);
        }
    }

}
