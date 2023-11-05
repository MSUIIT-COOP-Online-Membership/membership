<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seminar Email</title>
    <style>
        .container{
            max-width: 600px; 
            margin: 0 auto; 
            background-color: #F4F4F4;
        }

        .logo{
            background-color: #E0E7F0;
            height: 6rem;
        }

        .logo img{
            height: 4rem;
            width: auto;
        }

        .message{
            padding: 2.5rem;
            text-align: justify;
        }

        .font{
            font-weight: bold;
        }

        .sem-details{
            padding-left: 2.5rem;
            padding-right: 2.5rem;
        }

        .seminar-box {
            padding: 2rem;
            margin-bottom: 1rem;
            border: #004AAD;
            background-color: white;
            border-radius: 5px;
            border: 1px solid #ccc;
         }

        .gmeet{
            display:flex;
            align-items: center;
            padding-top: 1rem;
            padding-bottom: 0;
        }

        .gmeet img{
            height:2.5rem;
            width: auto;
            padding-right: 0.8rem;
        }

        .gmeet-txt{
            padding: 0.7rem;
            background-color: #1A73E8;
            color: white !important;
            border-radius: 5px;
            text-decoration: none;
        }

        .gmeet-text:hover{
            background-color: #004AAD;
        }

        .footer{
            background-color: #E0E7F0;
            padding: 2.5rem;
            text-align: justify;
        }

        @media screen and (max-width: 400px){
            .seminar-box{
                text-align: initial;
            }
            
            .sem-details{
                padding-left: 0;
                padding-right: 0;
            }

            .gmeet-txt{
                padding: 0.5rem;
                font-size: 13px;
                text-align: initial;
            }
        }
    </style>

</head>
    <body>
        <div class="container">
            <div class="logo">
                <img src= "{{ $message->embed(public_path('img/logo.png')) }}" alt="MSU-IIT NMPC Logo">
            </div>
            <div class="message">
                Dear <strong>{{ $seminar_data['name'] }}</strong>,<br> <br> 
                I hope this message finds you well. We are excited to invite you to our MSU-IIT NMPC seminar, where we will explore key insights and have discussions that can greatly benefit you as a member of the MSU-IIT NMPC. Please pick a schedule that is convenient for you. <br> <br> 
                Seminar Details: <br> <br>
                <div class="sem-details">
                        <div class="seminar-box">
                            <strong>Date</strong>: {{ $seminar_data['date']}} <br>
                            <strong>Time</strong>: {{ $seminar_data['time']}} <br>
                            <strong>Duration</strong>: {{ $seminar_data['duration']}} <br>
                            
                            <div class="gmeet">
                                <img src="{{ $message->embed(public_path('img/gmeet.png')) }}" alt="Gmeet Logo">
                                <a href="https://meet.google.com/ojw-xept-tfs" class="gmeet-txt"> Join with Google Meet </a>
                            </div>
                        </div>

                        <div class="seminar-box">
                            <strong>Date</strong>: {{ $seminar_data['date']}} <br>
                            <strong>Time</strong>: {{ $seminar_data['time']}} <br>
                            <strong>Duration</strong>: {{ $seminar_data['duration']}} <br>
                            
                            <div class="gmeet">
                                <img src="{{ $message->embed(public_path('img/gmeet.png')) }}" alt="Gmeet Logo">
                                <a href="https://meet.google.com/ojw-xept-tfs" class="gmeet-txt"> Join with Google Meet </a>
                            </div>
                        </div>
                        
                        <div class="seminar-box">
                            <strong>Date</strong>: {{ $seminar_data['date']}} <br>
                            <strong>Time</strong>: {{ $seminar_data['time']}} <br>
                            <strong>Duration</strong>: {{ $seminar_data['duration']}} <br>
                            
                            <div class="gmeet">
                                <img src="{{ $message->embed(public_path('img/gmeet.png')) }}" alt="Gmeet Logo">
                                <a href="https://meet.google.com/ojw-xept-tfs" class="gmeet-txt"> Join with Google Meet </a>
                            </div>
                        </div>
                </div>
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


