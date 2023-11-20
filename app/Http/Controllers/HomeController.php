<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            return view('home');
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
