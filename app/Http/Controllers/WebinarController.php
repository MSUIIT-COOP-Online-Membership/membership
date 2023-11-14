<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Webinar;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use RealRashid\SweetAlert\Facades\Alert;

class WebinarController extends Controller
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
        $webinars = Webinar::all();
        return view('webinars.index', compact('webinars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('webinars.create');
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
                'web_tool' => 'required|string',
                'date' => [
                    'required',
                    'date',
                    'after_or_equal:' . now()->toDateString(), // Ensure date is not before today
                ],
                'start_time' => 'required|date_format:H:i',
                'end_time' => [
                    'required',
                    'date_format:H:i',
                    function ($attribute, $value, $fail) use ($request) {
                        // Custom validation: Ensure end time is after start time
                        $startTime = strtotime($request->input('start_time'));
                        $endTime = strtotime($value);

                        if ($endTime <= $startTime) {
                            $fail('The end time must be after the start time.');
                        }
                    },
                ],
                'resource_speaker' => 'nullable|string',
                'web_link' => 'url|nullable',
            ]);

            // Store the webinar
            Webinar::create($request->all());

            Alert::success('Success!', 'Added webinar successfully.');

            return redirect()->route('webinars.index')->with('success', 'Webinar created successfully!');
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
        $webinar = Webinar::findOrFail($id);
        return view('webinars.show', compact('webinar'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $webinar = Webinar::findOrFail($id);
        return view('webinars.edit', compact('webinar'));
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
                'web_tool' => 'required',
                'date' => 'required|date',
                'start_time' => 'required|date_format:H:i',
                'end_time' => 'required|date_format:H:i|after:start_time',
                'resource_speaker' => 'nullable',
                'web_link' => 'nullable|url',
            ]);

            $webinar = Webinar::findOrFail($id);
            $webinar->update($request->all());

            Alert::success('Success!', 'Updated webinar successfully.');

            return redirect()->route('webinars.index')->with('success', 'Webinar updated successfully.');
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
            $webinar = Webinar::findOrFail($id);
            $webinar->delete();

            return response()->json(['success' => true, 'message' => 'Webinar deleted successfully.']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error: ' . $e->getMessage()]);
        }
    }

    public function getDates($id)
    {
        $webinar = Webinar::findOrFail($id);
        $dates = $webinar->where('web_tool', 'Google Meet')->pluck('date')->unique();

        return response()->json(['dates' => $dates]);
    }

    public function getTimes($id, $date)
    {
        $webinar = Webinar::findOrFail($id);
        $times = $webinar->where('web_tool', 'Google Meet')->where('date', $date)->pluck('start_time', 'end_time');

        return response()->json(['times' => $times]);
    }
}
