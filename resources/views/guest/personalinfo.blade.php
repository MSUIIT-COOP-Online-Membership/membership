<div class="row">
        <div class="col-md-4">
        <label for="fname" class="form-label">First name</label>
        <input type="text" class="form-control" id="fname"  required>
        <div class="invalid-feedback">
            Please provide a Firt Name.
          </div>
      </div>

      <div class="col-md-4">
        <label for="lname" class="form-label">Last name</label>
        <input type="text" class="form-control" id="lname"  required>
        {{-- <div class="valid-feedback">
          Looks good!
        </div> --}}
        <div class="invalid-feedback">
            This is required Field.
        </div>
      </div>

      <div class="col-md-4">
        <label for="mname" class="form-label">Middle name</label>
        <input type="text" class="form-control" id="mname"  required>
        {{-- <div class="valid-feedback">
          Looks good!
        </div> --}}
        <div class="invalid-feedback">
            This is required Field.
          </div>
      </div>

      {{-- bod, gender, and civil --}}

      <div class="col-md-4">
        <label for="date_of_birth" class="form-label">Date of Birth</label>
        <input type="date" class="form-control" id="date_of_birth"  required>
        <div class="invalid-feedback">
            This is required Field.
          </div>
      </div>

      <div class="col-md-4">
        <label for="gender" class="form-label"> Gender </label>
        <input type="text" class="form-control" id="gender"  required>
        {{-- <div class="valid-feedback">
          Looks good!
        </div> --}}
        <div class="invalid-feedback">
            This is required Field.
        </div>
      </div>

      <div class="col-md-4">
        <label for="civil_status" class="form-label">Civil Status</label>
        <select class="form-control" id="civil_status" required>
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

      <div class="col-md-4">
        <label for="email" class="form-label">Email Address</label>
        <input type="email" class="form-control" id="email"  required>
        <div class="invalid-feedback">
            This is required Field.
          </div>
      </div>

      <div class="col-md-4">
        <label for="telephone_number" class="form-label">Telephone Number</label>
        <input type="number" class="form-control" id="telephone_number"  >
        {{-- <div class="valid-feedback">
          Looks good!
        </div> --}}
        <div class="invalid-feedback">
            This is required Field.
        </div>
      </div>

      <div class="col-md-4">
        <label for="mobile_number" class="form-label">Mobile Number</label>
        <input type="number" class="form-control" id="mobile_number"  required>
        {{-- <div class="valid-feedback">
          Looks good!
        </div> --}}
        <div class="invalid-feedback">
            This is required Field.
          </div>
      </div>

      {{-- fb, occopation, and ofw --}}

      <div class="col-md-3">
        <label for="facebook_account" class="form-label">Facebook Account</label>
        <input type="text" class="form-control" id="facebook_account"  required>
        <div class="invalid-feedback">
            This is required Field.
          </div>
      </div>

      <div class="col-md-3">
        <label for="occupation" class="form-label">Occupation</label>
        <input type="text" class="form-control" id="occupation"  required>
        {{-- <div class="valid-feedback">
          Looks good!
        </div> --}}
        <div class="invalid-feedback">
            This is required Field.
        </div>
      </div>

      <div class="col-md-6">
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
      </div>


{{-- 
      <div class="col-md-6">
        <label for="validationCustom03" class="form-label">City</label>
        <input type="text" class="form-control" id="validationCustom03" required>
        <div class="invalid-feedback">
          Please provide a valid city.
        </div>
      </div>

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