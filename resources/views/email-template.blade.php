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
            Dear <strong>{{ $data['lname'] }} {{ $data['fname'] }} {{ $data['mname'] }}</strong>, <br> <br>

            We are writing to confirm your appointment with us scheduled for {{ $data['date'] }} at {{ $data['start_time'] }} at {{ $data['branch'] }}.
            We appreciate your commitment to joining us.

            <br> <br>
            <strong>Here are the details of the appointment:</strong><br><br>

            <strong>Date:</strong> {{ $data['date'] }}<br>
            <strong>Time:</strong> {{ $data['start_time'] }}<br>
            <strong>Location:</strong> {{ $data['branch'] }} <br> <br>

            Please take note of the following <strong>Documents to bring</strong> <br>
            --List here

        </div>

        <div class="footer">
            Should you have any questions, require additional information, or would like to discuss the topics covered in more detail, please list them for discussion during the Google Meet session. <br><br>

            Thank you for your interest and see you! <br>

            Join us, Grow with us! <br><br>

            Best regards, <br>
            <i>Admin of MSU-IIT NMPC</i> <br>
            https://www.msuiitcoop.org/ <br>
        </div>
    </div>
</body>

</html>