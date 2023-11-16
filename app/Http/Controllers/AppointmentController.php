<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use App\Models\Members;
use App\Models\Branches;
use App\Models\Appointment;

class AppointmentController extends Controller
{
    public function bookappointment(int $id)
    {
        $appointment = Members::findOrfail($id);
        $branch = Branches::all();
        return view('appointments.bookappointment', ['members' => $appointment], ['branch' => $branch]);
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

        $branch = Branches::find($request->input('branch'));
        $branchName = $branch ? $branch->name : 'Unknown Branch';
        $data = [
            'lname' => $request->input('lname'),
            'fname' => $request->input('fname'),
            'mname' => $request->input('mname'),
            'branch' => $branchName,
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
