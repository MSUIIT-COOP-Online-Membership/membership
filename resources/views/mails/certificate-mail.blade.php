<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificate Email</title>
    <style>

        body{
            background-image: url(img/bg.png);
            background-size: cover;
            background-position: center;
        }

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
            <img src= "{{ $message->embed(public_path('images/email/nmpc logo.png')) }}" alt="MSU-IIT NMPC Logo">
        </div>


        <div class="congrats-gif">
                <img src= "{{ $message->embed(public_path('images/email/congrats.gif')) }}" alt="Congratulations GIF">
            </div>
        <div class="message">
            Dear <strong>{{ $certificate_data['fname'] }} {{ $certificate_data['mname'] }} {{ $certificate_data['lname'] }}</strong>, <br> <br>


            We are pleased to present you with the e-certificate for your successful completion of the pre-membership form from MSUIIT NMPC.  <br>
            We appreciate your dedication in completing the evaluation form. Your certificate of appreciation for completing the evaluation and passing the evaluation is attached herewith.  <br> <br>

            You can now proceed to the membership application form using this usercode: <strong>{{ $userCode }}</strong>.  <br> <br>
            
            Please fill out the form at our membership portal: {{ $certificate_data['link'] }} <br>

            Have a great day! <br>
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
