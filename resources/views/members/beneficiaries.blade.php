<!-- /.Beneficiaries -->
<div class="tab-pane" id="section4">
    <strong><i class="fas fa-users mr-1"></i> Beneficiaries</strong>
    <hr>

    <!-- Beneficiary Information -->
    <h5 class="mt-3 mb-2"><i class="fas fa-user-friends mr-1"></i> Beneficiary Information</h5>
    @foreach ($beneficiaries as $beneficiary)
        <ul class="list-group">
            <li class="list-group-item">
                <i class="fas fa-user mr-2"></i><b>Last Name:</b> {{ $beneficiary->ben_lname }}
            </li>
            <li class="list-group-item">
                <i class="fas fa-user mr-2"></i><b>Middle Name:</b> {{ $beneficiary->ben_mname }}
            </li>
            <li class="list-group-item">
                <i class="fas fa-user mr-2"></i><b>First Name:</b> {{ $beneficiary->ben_fname }}
            </li>
            <li class="list-group-item">
                <i class="fas fa-user mr-2"></i><b>Suffix:</b> {{ $beneficiary->ben_suffix }}
            </li>
            <li class="list-group-item">
                <i class="fas fa-calendar-alt mr-2"></i><b>Date of Birth:</b> {{ $beneficiary->ben_dob }}
            </li>
            <li class="list-group-item">
                <i class="fas fa-user-friends mr-2"></i><b>Relationship:</b> {{ $beneficiary->ben_relationship }}
            </li>
        </ul>
    @endforeach

    <!-- Add more beneficiaries button -->
    <div class="mt-3">
        <button class="btn btn-primary" data-toggle="modal" data-target="#addBeneficiaryModal">
            <i class="fas fa-plus-circle mr-1"></i> Add Beneficiary
        </button>
    </div>
</div>

<!-- Add Beneficiary Modal -->
<div class="modal fade" id="addBeneficiaryModal" tabindex="-1" role="dialog" aria-labelledby="addBeneficiaryModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addBeneficiaryModalLabel">Add Beneficiary</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Include form fields for adding a new beneficiary -->
                <!-- Ensure to submit the form to the appropriate route for processing -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save Beneficiary</button>
            </div>
        </div>
    </div>
</div>
