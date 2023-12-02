<div class="row">
      <div class="col-md-4">
        <label for="validationCustom01" class="form-label">First name</label>
        <input type="text" class="form-control" id="validationCustom01"  required>
          <div class="invalid-feedback">
            Please provide a valid city.
          </div>
      </div>

      <div class="col-md-4">
        <label for="validationCustom02" class="form-label">Last name</label>
        <input type="text" class="form-control" id="validationCustom02"  required>
        {{-- <div class="valid-feedback">
          Looks good!
        </div> --}}
        <div class="invalid-feedback">
            Please provide a valid city.
        </div>
      </div>

      <div class="col-md-4">
        <label for="validationCustom02" class="form-label">Middle name</label>
        <input type="text" class="form-control" id="validationCustom02"  required>
        {{-- <div class="valid-feedback">
          Looks good!
        </div> --}}
        <div class="invalid-feedback">
            Please provide a valid city.
          </div>
      </div>
   

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
      </div>
         

</div>