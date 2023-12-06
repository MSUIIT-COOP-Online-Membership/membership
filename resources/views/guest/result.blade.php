<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Pre-membership</title>
    <link rel="stylesheet" href="{{ asset('/assets/premembershipform/css/premembership.css'); }}">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"> --}}

     <!-- Theme style -->
     <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">

     <link rel="stylesheet" href="{{ asset('/assets/premembershipform/css/header.css'); }}">
 
     <link rel="stylesheet" href="{{ asset('/assets/premembershipform/css/evaluationform.css'); }}">

     <link rel="stylesheet" href="{{ asset('/assets/premembershipform/css/result.css'); }}">

     <script src="{{ asset('css/js/evaluation.js') }}"></script>
     <!-- Fonts -->

 <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
</head>
        <body>

        @include('guest.header')

                <div class="home-box result-box">
                    <div class="result-box">
                        <!-- <header>
                            <h1>Result</h1>
                        </header>  -->
                        <!-- <hr class="separator/"> -->
                        @if($passOrFail === 'Fail')
                            <div class="Fail">
                                <div>
                                    <img src="{{ asset('images/email/X-no-bg.png') }}" alt="Failed">
                                </div>
                                <div class="right">
                                    <h1 class="score"> YOUR SCORE </h1> <br> 
                                    <span class="percentage">{{  $percentageScore }}% </span> 
                                    <h3 class="results"> <strong class="strong">Sorry.</strong> You {{ $passOrFail }} the Evaluation. <br></h3>
                                    <div class="btn-container"> <a href="#" class="btn-prev"><i class='bx bx-chevron-left'></i>Try Again</a></div>
                                </div>
                            </div>               
                        @else
                            <div class="Pass">
                                <div>
                                <img src= "{{ asset('images/email/C-no-bg.png') }}" alt="Passed">
                                </div>
                                <div class="right">
                                    <h1 class="score"> YOUR SCORE </h1> <br> 
                                    <span class="percentage">{{  $percentageScore }}% </span> 
                                    <h3 class="results"> <strong  class="strong">Congratulations.</strong> You {{ $passOrFail }} the Evaluation. <br><br>
                                    <span class="notify"><strong>Note:</strong> Please check your <strong>email</strong> for notification.</span></h3>
                                </div>
                            </div>
                            <!-- <div class="btn-container"><a href= "{{ route('certificate-mail-sent')}}"> Proceed </a></div> -->
                        @endif
                    </div>
                </div> 
        </body>
</html>