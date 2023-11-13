<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WebBooking;
use App\Models\Webinar;
use App\Models\Member;

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
        $webBookings = WebBooking::with(['member', 'webinar'])->paginate();

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
        $request->validate([
            'member_id' => 'required|exists:members,id',
            'web_id' => 'required|exists:webinars,id',
            'status' => 'required|string',
        ]);

        WebBooking::create($request->all());

        return redirect()->route('webbookings.index')
            ->with('success', 'Web Booking created successfully.');
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
        $request->validate([
            'member_id' => 'required|exists:members,id',
            'web_id' => 'required|exists:webinars,id',
            'status' => 'required|string',
        ]);

        $webBooking = WebBooking::findOrFail($id);
        $webBooking->update($request->all());

        return redirect()->route('webbookings.index')
            ->with('success', 'Web Booking updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        WebBooking::destroy($id);

        return redirect()->route('webbookings.index')
            ->with('success', 'Web Booking deleted successfully.');
    }

}
