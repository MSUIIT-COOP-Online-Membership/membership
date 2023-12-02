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

<<<<<<< HEAD
    <link rel="stylesheet" href="{{ asset('/assets/premembershipform/css/header.css'); }}">
    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
=======
     <link rel="stylesheet" href="{{ asset('/assets/premembershipform/css/header.css'); }}">
 
     <link rel="stylesheet" href="{{ asset('/assets/premembershipform/css/evaluationform.css'); }}">

     <!-- Fonts -->

 <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
>>>>>>> 9477024bcbefcf81f6c77227fc854d8387aeaaa3

 
        {{-- Mapbox API --}}

    <link href="https://api.mapbox.com/mapbox-gl-js/v2.14.1/mapbox-gl.css" rel="stylesheet">
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.14.1/mapbox-gl.js"></script>

</head>
<body>

    

    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="{{ asset('images/npmc-logo-nobg.png') }}" alt="MSUIIT COOP" width="200">
    </div>

   
    @include('guest.header')

    <main>


        <header>
            <h1>Online Pre-Membership Education Seminar</h1>
        </header>
      
        <div class="box-custom">
            <!-- progressive bar -->
            <div class="progress-wrap">
                <div class="step active-prog-first ">WELCOME</div>
                <div class="step ">Personal Information</div>
                <div class="step">Seminar Video</div>
                <div class="step">Evaluation Form</div>
            </div>
            <!-- form -->
            <div class="form-container">
                <form method="post" action="{{ route('premembershipform.store') }}" id="form" class="needs-validation" novalidate>
                    @csrf 

                    @method('post')

                    <!-- Welcome Page -->
                    <div class="tabpanel show">
                        @include('guest.welcome')
                    </div>

                    <!-- Personal Information -->
                    <div class="tabpanel ">
                        <div class="tab-header">
                            <h3>Personal Information</h3>
                        </div>
                        <div class="tab-subhead">
                          <h6>Basic Information</h6>
                        </div>

                        @include('guest.personalinfo')

                        
                        {{-- <div class="fields">
                            <div class="input-group">
                                <label for="fname">First Name</label> 
                                <input type="text" name="fname" placeholder="First Name" class="form-input" id="fname" required/>
                                <span class="field-message">This field is required</span>    

                            </div>
    
                            <div class="input-group">
                                <label for="lname">Last Name</label>
                                <input type="text" name="lname" placeholder="Last Name" class="form-input" id="lname" required/>
                                <span class="field-message">This field is required</span>
                            </div>
                            <div class="input-group">  
                            <label for="mname">Middle Name</label>
                            <input type="text" name="mname" placeholder="Middle Name" class="form-input" id="mname" required/>                    
                            <span class="field-message">This field is required</span>
                            </div>
    
                             <div class="input-group">
                                <label for="date_of_birth">Date of Birth</label>
                                <input type="date" name="date_of_birth" class="form-input" id="date_of_birth" required/>
                                <span class="field-message">This field is required</span>    
                            </div>
    
                            <div class="input-group">
                                <label for="gender">Gender</label>
                                <select name="gender" id="gender" required>
                                    <option value="">I am ---------</option>
                                    <option value="female">Female</option>
                                    <option value="male">Male</option>
                                  </select>
                                    <span class="field-message">This field is required</span>
                            </div>
    
                            <div class="input-group">  
                            <label for="civil_status">Civil Status</label>
                            <select name="civil_status" id="civil_status" required>
                                <option value="">I am ---------</option>
                                <option value="Single">Single</option>
                                <option value="Married">Married</option>
                                <option value="Widow">Widow</option>
                                <option value="Separated">Separated</option>
                              
                            </select>

                                <span class="field-message">This field is required</span>
                            </div>

                            <div class="input-group">
                                <label for="email">Email Address</label>
                                <input type="text" name="email" class="form-input" id="email" required/>
                                <span class="field-message">This field is required</span>
                            </div>
    
                            <div class="input-group">
                                <label for="telephone_number">Telephone Number (optional)</label> 
                                <input type="number" name="telephone_number" class="form-input" id="telephone_number" />
                            </div>
    
                            <div class="input-group">  
                            <label for="mobile_number">Mobile Number </label> 
                            <input type="number" name="mobile_number" placeholder="Phone" class="form-input" id="mobile_number" required/>                    
                            <span class="field-message">This field is required</span>
                            </div>

                            <div class="input-group">
                                <label for="facebook_account">Facebook Account Name</label>
                                <input type="text" name="facebook_account" class="form-input" id="facebook_account" required/>
                                <span class="field-message">This field is required</span>
                            </div>

                            <div class="input-group">
                                <label for="occupation">Occupation</label>
                                <input type="text" name="occupation" class="form-input" id="occupation" required/>
                                <span class="field-message">This field is required</span>
                            </div>


                            <div class="input-group">  
                                <label for="ofw_family_member">Do you have an OFW in your family?</label>
                                <select name="ofw_family_member" id="ofw_family_member" required>
                                    <option value="">I have ---------</option>
                                    <option value="Self">Self</option>
                                    <option value="Husband">Husband</option>
                                    <option value="Wife">Wife</option>
                                    <option value="Child">Child</option>
                                    <option value="None">None</option>
                                    <option value="Other">Other</option>    
                                  </select>
    
                                    <span class="field-message">This field is required</span>
                                </div>
                            
                                <div class="input-group">
                                    <label for="present_address">Address</label>
                                    <input type="text" name="present_address" class="form-input" id="present_address" required/>
                                    <span class="field-message">This field is required</span>
                                </div> 


                        </div> --}}
                        
                        <div class="btns-group">
                            <a href="#" class="btn-prev"><i class='bx bx-chevron-left'></i>Back</a>
                            <button type="button" class="btn btn-next btn-primary">Next</button>
                        </div>

                    </div>

                    <!-- tab -->
                    <div class="tabpanel">

                        <div class="tab-header">
                          <h3>Seminar</h3>
                        </div>
                        
                        <div style="display: flex; justify-content: center; align-items: center;">
<<<<<<< HEAD
                            <video style="max-width: 100%;" id="seminarVideo" controls>
                                <source src="{{ asset('/assets/premembershipform/video/seminar.mp4') }}" type="video/mp4">
=======
                            <video style="max-width: 100%;" id="seminarVideo" autoplay muted controls>
                                <source src="{{ asset('/assets/premembershipform/video/seminar.mp4'); }}" type="video/mp4">
>>>>>>> 9477024bcbefcf81f6c77227fc854d8387aeaaa3
                                Your browser does not support the video tag.
                            </video>
            
                        </div>

                        <div style="border-top: 1px solid #297AD8; margin-top:20px; padding-top: 20px; ">
                            <p style="font-style: italic;"><span style="font-weight:700;">Note: </span>
                            This system is designed in such a manner as to required the applicant 
                            to watch the seminar video before he can submit his application
                            </p>
                        </div>
                                
                                

                         <div class="btns-group">
                             <a href="#" class="btn-prev"><i class='bx bx-chevron-left'></i>Back</a>
                            <button type="button" class="btn btn-next btn-primary">Next</button>
                          </div>

                        
                    </div>
                    <!-- tab -->
                    @include('guest.evaluationform')

                    {{-- <div class="tabpanel">
                        

                        <h1>Preview</h1> 
                       
                        <div class="btns-group">
                            <a href="#" class="btn-prev"><i class='bx bx-chevron-left'></i>Back</a>
                            <div >
                              <input type='submit' class="submit btn-primary">
                            </div>
                          </div>
                    </div> --}}

                </form>
            </div>
        </div>
    </main>


    
</body>
<script src="{{ asset('/assets/premembershipform/js/premembership.js'); }}"></script>

<!-- Bootdrap CDN -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    
<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="<?php echo url('theme'); ?>/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?php echo url('theme'); ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo url('theme'); ?>/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo url('theme'); ?>/dist/js/adminlte.js"></script>


<!-- Load the `mapbox-gl-geocoder` plugin. -->
<script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.min.js"></script>
<link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.css" type="text/css">

<script>

    mapboxgl.accessToken = 'pk.eyJ1IjoidnJvbmFseW4iLCJhIjoiY2xjMDJnNWhtMWJxYzN1bXFjZmdnNDR3dSJ9.LkEnrvW8i-KTy-8lVyZs-g';    const map = new mapboxgl.Map({
        container: 'map',
        // Choose from Mapbox's core styles, or make your own style with Mapbox Studio
        style: 'mapbox://styles/mapbox/streets-v12',
        center: [124.240967, 8.231000],
        zoom: 15
    });

    // Add the control to the map.
    map.addControl(
        new MapboxGeocoder({
            accessToken: mapboxgl.accessToken,
            mapboxgl: mapboxgl
        })
    );
            // Add zoom and rotation controls to the map.
    map.addControl(new mapboxgl.NavigationControl())
    // // Add geolocate control to the map.
    // map.addControl(
    // new mapboxgl.GeolocateControl({
    // positionOptions: {
    // enableHighAccuracy: true
    // },
    // // When active the map will receive updates to the device's location as it changes.
    // trackUserLocation: true,
    // // Draw an arrow next to the location dot to indicate which direction the device is heading.
    // showUserHeading: true
    // })
    // );


// Define a variable to store the current marker
let currentMarker;

map.on('click', (e) => {
    const coordinates = e.lngLat;

    // Remove the previous marker if it exists
    if (currentMarker) {
        currentMarker.remove();
    }

    // Create a new marker at the clicked coordinates
    const marker = new mapboxgl.Marker({ color: '#FF0000' })
        .setLngLat(coordinates)
        .addTo(map);

    // Update input fields with latitude and longitude
    document.getElementById('longitude').value = coordinates.lng.toFixed(6);
    document.getElementById('latitude').value = coordinates.lat.toFixed(6);

    // Set the current marker to the newly created marker
    currentMarker = marker;

    // Now you can save the coordinates (coordinates.lng, coordinates.lat) to your database.
    console.log('Longitude:', coordinates.lng);
    console.log('Latitude:', coordinates.lat);
});
</script>

</html>