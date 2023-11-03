<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Pre-membership</title>
    <link rel="stylesheet" href="{{ asset('/assets/premembershipform/css/premembership.css'); }}">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>
<body>
    <nav>

    </nav>
    <main>
        <header>
            <h1>Pre-Online Membership</h1>
        </header>
        <div>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        </div>

        <div class="box">
            <!-- progressive bar -->
            <div class="progress-wrap">
                <div class="progress-bar active-prog-first ">WELCOME</div>
                <div class="progress-bar ">Personal Information</div>
                <div class="progress-bar">Type of Seminar</div>
                <div class="progress-bar">Preview</div>
            </div>
            <!-- form -->
            <div class="form-container">
                <form method="post" action="{{ route('premembershipform.store') }}" id="form" >
                    @csrf 

                    @method('post')

                    <!-- Welcome Page -->
                    <div class="tabpanel show">

                        <div class="tab-header">
                            <h1>Welcome</h1>
                        </div>
                        <div class="tab-content">
                            <p>
                                This is the online membership application 
                                for MSU-IIT National Multi-Purpose Cooperative (MSU-IIT NMPC) 
                            </p> <br>

                            <p>
                                Joining our cooperative provides you with access to a wide range of
                                 cooperative services and benefits, whether you are affiliated with the university or the broader community. We invite you to experience the advantages of cooperative membership.
                            </p> <br>

                            <p>
                                Our online system is designed for your convenience. It allows you to complete the application process from the comfort of your own space, at your own pace. This user-friendly
                                 platform is committed to making your application journey as smooth as possible.
                            </p> <br>

                            <p>Before you proceed, here’s what you need to do:</p>

                            <ul>
                                <li><span>Fill out your Personal Profile:</span> Start by entering your basic personal information.</li>
                                <li><span>Seminar Attendance:</span> Participate in the pre-membership education seminar via Google Meet or YouTube by following the link sent to your email.</li>
                                <li><span>Evaluation Form:</span> After you have completed the seminar, please fill out the evaluation form.</li>
                                <li><span>Document Submission:</span> When you are ready to apply for membership, present a printed hard copy of the certificate sent to your email in the [specified location], along with the following documents:
                                    <ul>
                                        <li>Duly accomplished Membership Application Form (MAF). Print the form and fill-in manually (handwritten).</li>
                                        <li>Photocopy of any government issued ID (with 3 specimen signatures), birth certificate, and marriage contract if any.</li>
                                        <li>One latest 2X2 ID picture</li>
                                    </ul>
                                </li>
                                <li><span>Minimum Initial Contribution:</span> Please note that the minimum initial contribution is 500 pesos.</li>
                            </ul>
        
                        </div>
                        
                        <div class="form-content">
                            <input type="checkbox" class="form-input" id="myCheck" required> I here by accept the policy
                            <span class="field-message" style="text-align: left; margin-top: 5px;">This field is required</span>
                        </div>
                        <div class="btns-group first-btn">
                            <button id="toReview" class="btn btn-next" type="button">Next</button>
                          </div>
                    </div>

                    <!-- Personal Information -->
                    <div class="tabpanel ">
                        <div class="tab-header">
                            <h1>Personal Information</h1>
                        </div>
                        <div class="tab-subhead">
                          <h3>Basic Information</h3>
                        </div>
                        <div class="fields">
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
                            <input type="text" name="mname" placeholder="Phone" class="form-input" id="mname" required/>                    
                            <span class="field-message">This field is required</span>
                            </div>
    
                             <div class="input-group">
                                <label for="date_of_birth">Birth of Date</label>
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
                        </div>
                        
                        <div class="btns-group">
                            <a href="#" class="btn-prev"><i class='bx bx-chevron-left'></i>Back</a>
                            <button type="button" class="btn btn-next">Next</button>
                        </div>

                    </div>

                    <!-- tab -->
                    <div class="tabpanel">

                        <div class="tab-header">
                          <h1>Seminar</h1>
                        </div>
                        
                        <div>
                            <div class="input-group">  
                                <label for="tool_name">Choose the tool for your online Seminar</label>
                                <select name="tool_name" id="tool_name" required>
                                    <option value="" disabled selected>Select an option</option>
                                    <option value="GGoogle meet">Google Meet</option>
                                    <option value="Youtube">Youtube</option>                                    
                                  </select>
                               <span class="field-message">This field is required</span>
                             </div>
                        </div>
                                
                                

                         <div class="btns-group">
                             <a href="#" class="btn-prev"><i class='bx bx-chevron-left'></i>Back</a>
                            <button type="button" class="btn btn-next">Next</button>
                          </div>

                        
                    </div>
                    <!-- tab -->

                    <div class="tabpanel">
                        
                        <h1>Preview</h1> 
                       
                        <div class="btns-group">
                            <a href="#" class="btn-prev"><i class='bx bx-chevron-left'></i>Back</a>
                            <div >
                              <input type='submit' class="submit">
                            </div>
                          </div>
                    </div>

                </form>
            </div>
        </div>
    </main>
</body>
<script src="{{ asset('/assets/premembershipform/js/premembership.js'); }}"></script>

</html>