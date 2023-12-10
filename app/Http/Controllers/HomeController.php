<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\Staff;
use App\Models\Branch;
use App\Models\Appointment;

class HomeController extends Controller
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
        // Fetch the total number of members, staff, and branches from the database
        $totalMembers = Member::count();
        $totalStaff = Staff::count();
        $totalBranches = Branch::count();
        $totalAppointments = Appointment::count();

        // Pass the total number of members, staff, and branches to the view
        return view('home', [
            'totalMembers' => $totalMembers,
            'totalStaff' => $totalStaff,
            'totalBranches' => $totalBranches,
            'totalAppointments' => $totalAppointments,
        ]);
    }

}
