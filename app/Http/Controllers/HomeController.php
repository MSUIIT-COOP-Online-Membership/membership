<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Member;
use App\Models\Staff;
use App\Models\Branch;
use App\Models\Appointment;
use App\Models\ToDoList;
use App\Models\Payment;

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

    public function showRegular()
    {
        return view('userpanel.regular');
    }

    public function showAssociate()
    {
        return view('userpanel.associate');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $role=Auth::user()->role;

        if($role == 'System Administrator')
        {
            // Fetch the total number of members, staff, and branches from the database
        $totalMembers = Member::count();
        $totalStaff = Staff::count();
        $totalBranches = Branch::count();
        $totalAppointments = Appointment::count();

        // Fetch the latest members from the database
        $members = Member::latest()->take(8)->get();

        // Fetch the ToDo list items from the database
        $todoItems = ToDoList::latest()->take(5)->get();

        // Fetch the latest payments from the database
        $payments = Payment::latest()->take(8)->get();

        // Pass the total number of members, staff, and branches to the view
        return view('home', [
            'members' => $members,
            'totalMembers' => $totalMembers,
            'totalStaff' => $totalStaff,
            'totalBranches' => $totalBranches,
            'totalAppointments' => $totalAppointments,
            'todoItems' => $todoItems, 
            'payments' => $payments,
        ]);
        }
        elseif ($role == 'Regular Member')
        {
            return redirect()->route('regular');
        }
        elseif ($role == 'Associate Member')
        {
            return redirect()->route('associate');
        }
        else
        {
            return view('login');
        }
    }
}
