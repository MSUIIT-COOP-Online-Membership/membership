<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use App\Models\Member;
use App\Models\Branch;
use App\Models\Appointment;

class AppointmentFormController extends Controller
{
    public function bookappointment($usercode)
    {
        $members = Member::where('usercode', $usercode)->get();
        $branch = Branch::all();
        return view('appointments.bookappointment', ['members' => $members], ['branch' => $branch]);
    }

    public function addappointment(Request $request)
    {
        $appointment = new Appointment();
        $appointment->member_id = request('member_id');
        $appointment->branch_id = request('branch');
        $appointment->subject = request('subject');
        $appointment->date = request('date');
        $appointment->start_time = request('start_time');
        $appointment->end_time = request('end_time');
        $appointment->status = 'pending';
        $appointment->save();

        $branch = Branch::find($request->input('branch'));
        $branchName = $branch ? $branch->name : 'Unknown Branch';
        $branchAddress = $branch ? $branch->address : 'Unknown Address';
        $data = [
            'lname' => $request->input('lname'),
            'fname' => $request->input('fname'),
            'mname' => $request->input('mname'),
            'suffix' => $request->input('suffix'),
            'branch' => $branchName,
            'address' => $branchAddress,
            'date' => $request->input('date'),
            'start_time' => $request->input('start_time'),
            'branch_id' => $request->input('branch_id'),
        ];

        if ($this->isOnline()) {
            $mail_data = [
                'recipient' => request('member_email'),
                'fromEmail' => 'msuiitnmpc.iligan@gmail.com',
                'fromName' => 'MSU-IIT NMPC',
                'subject' => 'Membership Walk-in Appointment',
            ];

            Mail::send('email-template', ['data' => $data], function ($message) use ($mail_data) {
                $message->to($mail_data['recipient'])
                    ->from($mail_data['fromEmail'], $mail_data['fromName'])
                    ->subject($mail_data['subject']);
            });
            return view('appointments.email_success');
        } else {
            return redirect()->back()->withInput()->with('error', 'Check your internet conenction');
        }
    }

    public function isOnline($site = "https://youtube.com/")
    {
        if (@fopen($site, "r")) {
            return true;
        } else {
            return false;
        }
    }
}
