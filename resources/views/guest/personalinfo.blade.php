<div class="row">
        <div class="col-md-4 form-check">
        <label for="fname" class="form-label">First name</label>
        <input type="text" class="form-control" name="fname" id="fname"  required>
        <div class="invalid-feedback">
            Please provide a Firt Name.
          </div>
      </div>

      <div class="col-md-4 form-check">
        <label for="lname" class="form-label">Last name</label>
        <input type="text" class="form-control" name="lname" id="lname"  required>
        {{-- <div class="valid-feedback">
          Looks good!
        </div> --}}
        <div class="invalid-feedback">
            This is required Field.
        </div>
      </div>

      <div class="col-md-4 form-check">
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

      <div class="col-md-4 form-check">
        <label for="dob" class="form-label">Date of Birth</label>
        <input type="date" class="form-control" name="dob" id="dob"  required>
        <div class="invalid-feedback">
            This is required Field.
          </div>
      </div>

      <div class="col-md-4 form-check">
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

      <div class="col-md-4 form-check">
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

      <div class="col-md-4 form-check">
        <label for="email" class="form-label">Email Address</label>
        <input type="email" class="form-control" name="email" id="email" autocomplete="email" required>
        <div class="invalid-feedback">
            This is required Field.
          </div>
      </div>

      <div class="col-md-4 form-check">
        <label for="tel_no" class="form-label">Telephone Number</label>
        <input type="number" class="form-control" name="tel_no" id="tel_no"  >
        {{-- <div class="valid-feedback">
          Looks good!
        </div> --}}
        <div class="invalid-feedback">
            This is required Field.
        </div>
      </div>

      <div class="col-md-4 form-check">
        <label for="mobile_no" class="form-label">Mobile Number</label>
        <input type="number" class="form-control" name="mobile_no" id="mobile_no"  required>
    
        <div class="invalid-feedback">
            This is required Field.
          </div>
      </div>

      {{-- fb, occopation, and ofw --}}

      <div class="col-md-4 form-check">
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

      <div class="col-md-6 form-check">
        <label for="present_address" class="form-label">Present Address</label>
        <input type="text" class="form-control" name="present_address" id="present_address" required>
        <div class="invalid-feedback">
          Please provide a valid Address.
        </div>
      </div>

{{-- 
   

      <div class="col-md-3">
        <label for="validationCustom04" class="form-label">State</label>
        <select class="form-control" id="validationCustom04" required>
          <option selected disabled value="">Choose...</option>
          <option>...</option>
        </select>
        <div class="invalid-feedback">
          Please select a valid state.
        </div>
      </div>
      <div class="col-md-3">
        <label for="validationCustom05" class="form-label">Zip</label>
        <input type="text" class="form-control" id="validationCustom05" required>
        <div class="invalid-feedback">
          Please provide a valid zip.
        </div>
      </div> --}}
         

</div>