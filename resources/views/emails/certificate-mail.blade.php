<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificate Email</title>
    <style>
        .container{
            max-width: 600px; 
            margin: 0 auto; 
            background-color: white;
            border: 1px solid #ccc;
        }

        .logo{
            background-color: #E0E7F0;
            height: 6rem;
            text-align: center;
            padding-top: 2rem;
        }

        .logo img{
            height: 4rem;
            width: auto;
        }

        .congrats-gif{
            text-align: center;
            padding-top: 2.5rem;
        }

        .message{
            padding: 2.5rem;
            text-align: justify;
        }

        .footer{
            background-color: #E0E7F0;
            padding: 2.5rem;
            text-align: justify;
        }
    </style>
</head>
<body style="background-image: #F4F4F4;">
    <div class="container">
        <div class="logo">
            <img src= "{{ $message->embed(public_path('img/email/nmpc logo.png')) }}" alt="MSU-IIT NMPC Logo">
        </div>

        <div class="congrats-gif">
                <img src= "{{ $message->embed(public_path('img/email/congrats.gif')) }}" alt="Congratulations GIF">
            </div>
        <div class="message">
            Dear <strong>{{ $certificate_data['name'] }}</strong>, <br> <br>

            Congratulations for making it this far. We appreciate your dedication in completing the evaluation form. Your valuable input is crucial to us, and we are grateful for your participation.
            Your certificate of appreciation for completing the evaluation and pre-membership form is ready. Attached herewith is your Certificate. <br> <br>

            You can now log in using this link: <a href="http://127.0.0.1:8000/login">http://127.0.0.1:8000/login</a>

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