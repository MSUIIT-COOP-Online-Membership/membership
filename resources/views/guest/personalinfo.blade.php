<div class="row">
        <div class="col-md-4 form-checks">
        <label for="fname" class="form-label">First name</label>
        <input type="text" class="form-control" name="fname" id="fname"  required>
        <div class="invalid-feedback">
            Please provide a Firt Name.
          </div>
      </div>

      <div class="col-md-4 form-checks">
        <label for="lname" class="form-label">Last name</label>
        <input type="text" class="form-control" name="lname" id="lname"  required>
        {{-- <div class="valid-feedback">
          Looks good!
        </div> --}}
        <div class="invalid-feedback">
            This is required Field.
        </div>
      </div>

      <div class="col-md-4 form-checks">
        <label for="mname" class="form-label">Middle name</label>
        <input type="text" class="form-control" name="mname" id="mname"  required>
        {{-- <div class="valid-feedback">
          Looks good!
        </div> --}}
        <div class="invalid-feedback">
            This is required Field.
          </div>
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
          <option selected disabled value="">Choose...</option>
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
            <option selected disabled value="">Choose...</option>
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
        {{-- <div class="valid-feedback">
          Looks good!
        </div> --}}
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

      {{-- <div class="col-md-3">
        <label for="occupation" class="form-label">Occupation</label>
        <input type="text" class="form-control" name="occupation" id="occupation"  required>

        <div class="invalid-feedback">
            This is required Field.
        </div>
      </div> --}}

      {{-- <div class="col-md-5">
        <label for="ofw_family_member" class="form-label">Do you have an OFW in your Family?</label>
        <select class="form-control" id="ofw_family_member" required>
            <option selected disabled value="">Choose...</option>
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
      </div> --}}


         
 
</div>

    <div class="col-md-6 form-checks" >
      <label for="present_address" class="form-label">Present Address</label>
      <input type="text" class="form-control" name="present_address" id="present_address" required>
      <div class="invalid-feedback">
        Please provide a valid Address.
      </div>
</div>

<div style="margin-top: 50px; border-top: 1px solid #297AD8; padding-top:40px; text-align: center;">

    <h3 style="margin-bottom: 20px; color: #297AD8;">Plot Your Home on the Map</h3>
      <p style="margin-bottom: 50px;">Plot your home on the provided map by using the search or zoom functions to locate your area. Alternatively, you can input the longitude and latitude of your home directly. Once you've found the location, 
        click or tap on the map, and a red marker should be displayed to indicate your home</p>
  
        <div class="col-md-8 mx-auto" style="margin-bottom:30px;">
          <div class="row">
              <div class="col-md-3 ">
                  <label for="longitude">Longitude</label>
              </div>
              <div class="col-md-3 form-checks">
                <input type="text" name="longitude" class="form-control" id="longitude" required>
                <div class="invalid-feedback">
                    Please plot your address on the map.
                </div>
            </div>
              <div class="col-md-3">
                  <label for="latitude">Latitude</label>
              </div>
            
              <div class="col-md-3 form-checks">
                  <input type="text" name="latitude" class="form-control" id="latitude" required>
                  <div class="invalid-feedback">
                      Please plot your address on the map.
                  </div>
              </div>
          </div>
      </div>
      

  <div id="map"></div>

</div>
