<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificate-PDF</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,600;1,700;1,900&display=swap');

        *{
            margin: 0;
            padding: 0;
            max-width: 100%;
            max-height: 100%;
        }

        body{
            font-family: 'Poppins', sans-serif;
            font-weight: 800;
            /* background-image: url('/public/images/email/bg.png'); */
            background-color: #E8ECEF;
            margin: 2rem;
        }

        .head{
            display: flex;
            align-items: center;
            justify-content: center;
            padding-top: 2rem;
        }

        .head img{
            height: 4rem;
            margin-right: 1rem;
        }

        
        .head p{
            font-size: 1rem;
            font-weight: 500;
            text-transform: uppercase;
            line-height: 1.2rem;
            margin-left: 23rem; 
        }

        .container{
            text-align: center;
        }

        .container h3{
            padding-top: 3rem;
            font-size: 3.5rem;
            text-transform: uppercase;
        }

        .container h1{
            font-size: 6rem;
            text-transform: uppercase;
            padding-bottom: 1rem;
        }

        .container h1, h3{
            line-height: 6rem;
            font-weight: 800;
        }

        .name{
            font-size: 4rem;
            font-weight: 800;
            text-transform: uppercase;
            color: #9C0B0F;
        }

        .separator1 {
            display: inline-block;
            border: none;
            width: 80%;
            justify-content: center;
            border-top: 3px solid #000000;
        }

        .message{
            text-align: justify;
            padding-top: 0.6rem;
            padding-left: 9rem;
            padding-right: 9rem;
        }

        span{
            font-weight: 600;
        }

        .signatures {
            text-align: center; 
            padding-top: 4rem;
        }

        .signatures div {
            display: inline-block; 
            width: 25%; 
            margin: 0 2%; 
            text-align: center;
        }
                

        .separator2 {
            border: none;
            width: 100%;
            justify-content: center;
            border-top: 1px solid #000000;
            margin-top: 2.5rem;
        }
    </style>

</head>
<body>
    <header>
        <div class="head">
        <img src="{{ $message->embed(asset('images/email/nmpc-logo-nobg.png')) }}" alt="MSU-IIT NMPC Logo">
            
            <p> Mindanao State University <br>
                Iligan Institute of Technology<br>
                National Multi-purpose Cooperative 
            </p>
        </div>
    </header>

    <div class="container">
        <h3 >Certificate of <br></h3>
        <h1>Appreciation <br></h1>
        <p>is presented to <br> <br></p>

        <div class="name"> {{ $certificate_data['fname'] }} {{ $certificate_data['mname'] }} {{ $certificate_data['lname'] }} </div> 
        <hr class="separator1">
        <p class="message">
            has demonstrated outstanding dedication and proficiency by successfully completing 
            the <span>PRE-MEMBERSHIP APPLICATION FORM </span> and <span>PASSING THE EVALUATION FORM </span> on December 5, 2023. 
        </p>

        <div class="signatures">
            <div>
                <hr class="separator2">
                <strong>Name</strong>
                <p>Position</p>    
            </div>

            <div>
                <hr class="separator2">
                <strong>Name</strong>
                <p>Position</p>    
            </div>

            <div>
                <hr class="separator2">
                <strong>Name</strong>
                <p>Position</p>    
            </div>
        </div>
        

    </div>
    
</body>
</html>