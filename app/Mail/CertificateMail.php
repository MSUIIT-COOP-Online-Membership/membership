<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Queue\SerializesModels;

class CertificateMail extends Mailable
{
    use Queueable, SerializesModels;


    /* Constructor of the Email @return void */
    public $certificate_data;
    public function __construct($certificate_data)
    {
        $this->certificate_data = $certificate_data;
    }

    /* From of the Email*/
    public function build(){
        return $this->from(address: 'msuiitnmpc.iligan@gmail.com', name: 'MSUIIT NMPC');
    }
    
    /* Subject of the email */
    public function envelope()
    {
        return new Envelope(
            subject: 'Congratulations on Completing the Evaluation Form',
        );
    }

    /* Content of the email*/
    public function content()
    {
        return new Content(
            view: 'emails.certificate-mail'
        );
    }

    /* Attachments of the email */
    public function attachments(): array
    {
        return [
            public_path('attachments/CertificateEmail.pdf')
        ];
    }
}

