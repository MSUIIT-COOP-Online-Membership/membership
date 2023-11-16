<?php

namespace App\Http\Controllers\Email;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use App\Mail\CertificateMail;
use Illuminate\Support\Facades\Log;

class CertificateController extends Controller
{
    public function certificateEmail(){

        $users = User::get();

        foreach($users as $user)
        {
            $certificate_data =[
                'name' => $user->name,
                'date' => '11/14/23',
                'time' => '1:00PM',
                'duration' => "15 minutes",
            ];
    
            Mail::to($user->email)->send(new CertificateMail($certificate_data));
        }
        Log::info('Email was sent.');
        return redirect()->back()->with("success","");
    }
}
