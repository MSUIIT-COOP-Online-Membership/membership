<?php

namespace App\Http\Controllers\Email;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\CertificateMail;

class CertificateController extends Controller
{
    public function certificateEmail(){
        $certificate_data =[
            'name' => 'Hanan Ramos'
        ];



    Mail::to('hananramos16@gmail.com')->send(new CertificateMail($certificate_data));
    echo ("Email Sent Successfully");
    }
}
