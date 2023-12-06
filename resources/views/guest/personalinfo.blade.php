<div class="row">
        <div class="col-md-3 form-checks">
        <label for="fname" class="form-label">First name</label>
        <input type="text" class="form-control" name="fname" id="fname"  required>
        <div class="invalid-feedback">
            Please provide a Firt Name.
          </div>
      </div>

      <div class="col-md-3 form-checks">
        <label for="lname" class="form-label">Last name</label>
        <input type="text" class="form-control" name="lname" id="lname"  required>
        <div class="invalid-feedback">
            This is required Field.
        </div>
      </div>

      <div class="col-md-3 form-checks">
        <label for="mname" class="form-label">Middle name</label>
        <input type="text" class="form-control" name="mname" id="mname"  required>

        <div class="invalid-feedback">
            This is required Field.
          </div>
      </div>

      <div class="col-md-2 form-checks">
        <label for="suffix" class="form-label">Suffix</label>
        <select class="form-control" name="suffix" id="suffix">
          <option selected disabled value="">Select...</option>
          <option value="Sr.">Sr.</option>
          <option value="Jr.">Jr.</option>
          <option value="I">I</option>
          <option value="II">II</option>
          <option value="III">III</option>
          <option value="IV">IV</option>
          <option value="V">V</option>

        </select>
      </div>

      {{-- bod, gender, and civil --}}

      <div class="col-md-4 form-checks">
        <label for="dob" class="form-label">Date of Birth</label>
        <input type="date" class="form-control" name="dob" id="dob"  required>
        <div class="invalid-feedback">
            This is required Field.
          </div>
      </div>

      <div class="col-md-4 form-checks">
        <label for="sex" class="form-label"> Gender </label>
        <select class="form-control" name="sex" id="sex" required>
          <option selected disabled value="">Select...</option>
          <option value="female">Female</option>
          <option value="male">Male</option>
      </select>
        <div class="invalid-feedback">
            This is required Field.
        </div>
      </div>

      <div class="col-md-4 form-checks">
        <label for="civil_status" class="form-label">Civil Status</label>
        <select class="form-control" name="civil_status" id="civil_status" required>
            <option selected disabled value="">Select...</option>
            <option value="Single">Single</option>
            <option value="Married">Married</option>
            <option value="Widow">Widow</option>
            <option value="Separated">Separated</option>
        </select>
        <div class="invalid-feedback">
            This is required Field.
          </div>
      </div>

      {{-- email, tel, mob --}}

      <div class="col-md-4 form-checks">
        <label for="email" class="form-label">Email Address</label>
        <input type="email" class="form-control" name="email" id="email" autocomplete="email" required>
        <div class="invalid-feedback">
            This is required Field.
          </div>
      </div>

      <div class="col-md-4 form-checks">
        <label for="tel_no" class="form-label">Telephone Number</label>
        <input type="number" class="form-control" name="tel_no" id="tel_no"  >
      
        <div class="invalid-feedback">
            This is required Field.
        </div>
      </div>

      <div class="col-md-4 form-checks">
        <label for="mobile_no" class="form-label">Mobile Number</label>
        <input type="number" class="form-control" name="mobile_no" id="mobile_no"  required>
    
        <div class="invalid-feedback">
            This is required Field.
          </div>
      </div>

      {{-- fb, occopation, and ofw --}}

      <div class="col-md-4 form-checks">
        <label for="religion" class="form-label">Religion</label>
        <input type="text" class="form-control" name="religion" id="religion"  required>
        <div class="invalid-feedback">
            This is required Field.
          </div>
      </div>

      <div class="col-md-3 form-checks">
        <label for="occupation" class="form-label">Occupation</label>
        <input type="text" class="form-control" name="occupation" id="occupation"  required>

        <div class="invalid-feedback">
            This is required Field.
        </div>
      </div>

      <div class="col-md-5 form-checks">
        <label for="ofw_family_member" class="form-label">Do you have an OFW in your Family?</label>
        <select class="form-control" name="ofw_family_member" id="ofw_family_member" required>
            <option selected disabled value="">Select...</option>
            <option value="Self">Self</option>
            <option value="Husband">Husband</option>
            <option value="Wife">Wife</option>
            <option value="Child">Child</option>
            <option value="None">None</option>
            <option value="Other">Other</option>
        </select>
        <div class="invalid-feedback">
            This is required Field.
          </div>
      </div>


         
 
</div>

    <div class="col-md-6 form-checks" >
      <label for="present_address" class="form-label">Present Address</label>
      <input type="text" class="form-control" name="present_address" id="present_address" required>
      <div class="invalid-feedback">
        Please provide a valid Address.
      </div>
</div>

<div style="margin-top: 50px; border-top: 1px solid #297AD8; padding-top:40px; ">

  <div id="Alert" class="alert alert-primary alert-dismissible fade show" role="alert">
    <strong>Reminder!</strong> Please ensure you have marked your home on the map for accurate information before proceeding.
  </div>

    <h3 style="margin-bottom: 20px; color: #297AD8; text-align: center;">Plot Your Home on the Map</h3>
      <p style="margin-bottom: 50px; text-align: center;">
        Plot your home on the provided map by 
        clicking or tapping on the specific
         area. Utilize the search or zoom functions 
         to locate your area. 
         Once you've found the location, click or tap on the map. 
          A red marker should be displayed to indicate that you
           have successfully plotted your home.</p>
  
      
      <div class="form-checks" >
        <input type="number" step="any" name="latitude" class="form-control" id="latitude" hidden  required>
        <input type="number" step="any" name="longitude" class="form-control" id="longitude" hidden  >

      </div>

      <div id="map"></div>

</div>
