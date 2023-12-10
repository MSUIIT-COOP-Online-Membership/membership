<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificate Email</title>
    <style>
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: white;
            border: 1px solid #ccc;
        }

        .logo {
            background-color: #E0E7F0;
            height: 6rem;
            text-align: center;
            padding-top: 2rem;
        }

        .logo img {
            height: 4rem;
            width: auto;
        }

        .congrats-gif {
            text-align: center;
            padding-top: 2.5rem;
        }

        .message {
            padding: 2.5rem;
            text-align: justify;
        }

        .footer {
            background-color: #E0E7F0;
            padding: 2.5rem;
            text-align: justify;
        }
    </style>
</head>

<body style="background-image: #F4F4F4;">
    <div class="container">
        <div class="logo">
            <img src="{{ $message->embed(public_path('images/email/nmpc logo.png')) }}" alt="MSU-IIT NMPC Logo">
        </div>

        <div class="congrats-gif">
            <img src="{{ $message->embed(public_path('images/email/congrats.gif')) }}" alt="Congratulations GIF">
        </div>
        <div class="message">
            Dear <strong>{{ $data['fname'] }} {{ $data['mname'] }} {{ $data['lname'] }} {{ $data['suffix'] }}</strong>, <br> <br>

            We are writing to confirm your appointment with us scheduled for {{ $data['date'] }} at {{ \Carbon\Carbon::parse($data['start_time'])->format('g:i A') }} at {{ $data['branch'] }} Branch.
            We appreciate your commitment to joining us.

            <br> <br>
            <strong>Here are the details of the appointment:</strong><br><br>

            <strong>Date:</strong> {{ \Carbon\Carbon::parse($data['date'])->format('l, F j, Y') }}<br>
            <strong>Time:</strong> {{ \Carbon\Carbon::parse($data['start_time'])->format('g:i A') }}<br>
            <strong>Location:</strong> {{ $data['branch'] }}, {{ $data['address'] }} <br> <br>

            Please take note of the following <strong>Documents to bring</strong> <br>
            <ul>
                <li>Photocopy of any government issude ID (with 3 specimen signatures)</li>
                <li>Birth certificate</li>
                <li>Marriage contract if any</li>
            </ul>

            Please take note that <strong>the minimum initital contribution is 500 pesos.</strong><br>

            Join us, <strong>Grow with us!</strong>
        </div>

        <div class="footer">
            <i class="disclaimer">Disclaimer: This message contains confidential information and is intended only for the individual named. 
            If you are not the named addressee you should not disseminate, distribute or copy this e-mail. 
            Please notify the sender immediately by e-mail if you have received this e-mail by mistake and delete this e-mail from your system. 
            E-mail transmission cannot be guaranteed to be secure or error-free as information could be intercepted, corrupted, lost, 
            destroyed, arrive late or incomplete, or contain viruses. The sender therefore does not accept liability for any errors or 
            omissions in the contents of this message, which arise as a result of e-mail transmission. 
            If verification is required please request a hard-copy version. <br>
            https://www.msuiitcoop.org/ <br> </i>  <br> <br>


            Best regards, <br>
            <i>Admin of MSU-IIT NMPC</i> <br>
            (063) 223-5874
            Gregorio T. Lluch Sr. Ave., Pala-o Iligan City, 9200, Philippines <br>
        </div>
    </div>
</body>

</html>