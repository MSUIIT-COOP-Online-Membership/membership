<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SeminarMail extends Mailable
{
    use Queueable, SerializesModels;

    private $seminar_data;

    public function __construct($seminar_data)
    {
        $this->seminar_data = $seminar_data;
    }

    public function build()
    {
        return $this->from('msuiitnmpc.iligan@gmail.com', 'MSUIIT NMPC')
                    ->subject('Join Our Seminar - Access the Google Meet Link')
                    ->view('emails.seminar-mail')
                    ->with('seminar_data', $this->seminar_data); // Pass the variable to the view
    }
}

