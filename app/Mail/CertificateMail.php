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
        // $pdfContent = $this->generatePDF();

        return $this->from('msuiitnmpc.iligan@gmail.com', 'MSU-IIT NMPC')
            ->subject('E-Certificate - Completion of the Pre-Membership Form from MSUIIT NMPC')
            ->view('mails.certificate-mail')
            // ->attachData($pdfContent, 'certificate_' . $this->userCode . '.pdf', [
            //     'mime' => 'application/pdf'
            // ])
            ->with([
                'certificate_data' => $this->certificate_data,
                'userCode' => $this->userCode,
            ]);
    }

    // protected function generatePDF()
    // {
    //     // Render the certificate PDF content using the Blade template
    //     $html = View('mails.certificate-pdf', [
    //         'certificate_data' => $this->certificate_data,
    //         'userCode' => $this->userCode,
    //     ])->render();

    //     // Convert HTML to PDF using Dompdf
    //     $dompdf = new Dompdf();
    //     $dompdf->loadHtml($html);
    //     $dompdf->setPaper('Letter', 'landscape');

    //     $dompdf->render();

    //     return $dompdf->output();
    // }
}
