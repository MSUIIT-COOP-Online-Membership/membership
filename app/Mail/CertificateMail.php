<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\View;

class CertificateMail extends Mailable
{
    use Queueable, SerializesModels;

    public $certificate_data;
    public $userCode;

    public function __construct($certificate_data, $userCode)
    {
        $this->certificate_data = $certificate_data;
        $this->userCode = $userCode;
    }

    public function build()
    {
        $pdfContent = $this->generatePDF();
        $imagePath = public_path('images/npmc-logo-nobg.png/' . $this->certificate_data['img']);

        return $this->from('msuiitnmpc.iligan@gmail.com', 'MSU-IIT NMPC')
        ->subject('E-Certificate - Completion of the Pre-Membership Form from MSUIIT NMPC')
        ->view('mails.certificate-mail')
        ->attachData($pdfContent, 'certificate_' . $this->certificate_data['fname'] . $this->certificate_data['lname'] . '.pdf', [
            'mime' => 'application/pdf'
        ])
        ->with([
            'certificate_data' => $this->certificate_data,
            'userCode' => $this->userCode,
            'imagePath' => $imagePath, 
        ]);
    
    }
    protected function generatePDF()
    {
        // Render the certificate PDF content using the Blade template
        $html = View('mails.certificate-pdf', [
            'certificate_data' => $this->certificate_data,
            'userCode' => $this->userCode,
        ])->render();

        // Create Dompdf instance
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('Letter', 'landscape');

        // Render PDF
        $dompdf->render();

        // Return the generated PDF content
        return $dompdf->output();
    }


}
