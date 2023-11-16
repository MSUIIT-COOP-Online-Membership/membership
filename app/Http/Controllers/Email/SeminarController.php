<?php

namespace App\Http\Controllers\Email;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SeminarMail;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class SeminarController extends Controller
{
    public function seminarEmail()
    {
        $users = User::get();

        foreach($users as $user)
        {
            $seminar_data =[
                'name' => $user->name,
                'date' => '11/14/23',
                'time' => '1:00PM',
                'duration' => "15 minutes",
            ];
    
            Mail::to($user->email)->send(new SeminarMail($seminar_data));
        }
        Log::info('Email was sent.');
        return redirect()->back()->with("success","");
    }
}
