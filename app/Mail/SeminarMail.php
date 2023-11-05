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

    /* Constructor of the Email @return void */
    public $seminar_data;
    public function __construct($seminar_data)
    {
        $this->seminar_data = $seminar_data;
    }

    /* From of the Email*/
    public function build()
    {
        return $this->from(address: 'msuiitnmpc.iligan@gmail.com', name: 'MSUIIT NMPC');
    }

    /* Subject of the email */
    public function envelope()
    {
        return new Envelope(
            subject:'Join Our Seminar - Access the Google Meet Link'
        );
    }

    /* Content of the email*/
    public function content()
    {
        return new Content(
            view: 'emails.seminar-mail',
        );
    }

    /* Attachments of the email */
    public function attachments()
    {
        return [];
    }
}
