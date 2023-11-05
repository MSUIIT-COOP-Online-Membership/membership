<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\SeminarMail;
use Illuminate\Support\Facades\Mail;

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