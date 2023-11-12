<?php

namespace App\Http\Controllers\Email;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SeminarMail;

class SeminarController extends Controller
{
    public function seminarEmail(){
        $seminar_data =[
            'name' => "Hanan Ramos",
            'date' => "September 29, 2024",
            'time' => "1:00pm",
            'duration' => "15 minutes",
        ];

        Mail::to('hananramos16@gmail.com')->send(new SeminarMail($seminar_data));
        echo ("Email Sent Successfully");
    }
}
