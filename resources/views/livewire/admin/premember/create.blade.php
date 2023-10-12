<div class="card">
    <div class="card-header p-0">
        <h3 class="card-title">{{ __('CreateTitle', ['name' => __('Premember') ]) }}</h3>
        <div class="px-2 mt-4">
            <ul class="breadcrumb mt-3 py-3 px-4 rounded">
                <li class="breadcrumb-item"><a href="@route(getRouteName().'.home')" class="text-decoration-none">{{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item"><a href="@route(getRouteName().'.premember.read')" class="text-decoration-none">{{ __(\Illuminate\Support\Str::plural('Premember')) }}</a></li>
                <li class="breadcrumb-item active">{{ __('Create') }}</li>
            </ul>
        </div>
    </div>

    <form class="form-horizontal" wire:submit.prevent="create" enctype="multipart/form-data">

        <div class="card-body">
                        <!-- Fname Input -->
            <div class='form-group'>
                <label for='input-fname' class='col-sm-12 control-label '> {{ __('First Name') }}</label>
                <input type='text' id='input-fname' wire:model.lazy='fname' class="form-control  @error('fname') is-invalid @enderror" placeholder='' autocomplete='on'>
                @error('fname') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            <!-- Mname Input -->
            <div class='form-group'>
                <label for='input-mname' class='col-sm-12 control-label '> {{ __('Middle Name') }}</label>
                <input type='text' id='input-mname' wire:model.lazy='mname' class="form-control  @error('mname') is-invalid @enderror" placeholder='' autocomplete='on'>
                @error('mname') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            <!-- Lname Input -->
            <div class='form-group'>
                <label for='input-lname' class='col-sm-12 control-label '> {{ __('Last Name') }}</label>
                <input type='text' id='input-lname' wire:model.lazy='lname' class="form-control  @error('lname') is-invalid @enderror" placeholder='' autocomplete='on'>
                @error('lname') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            <!-- Email Input -->
            <div class='form-group'>
                <label for='input-email' class='col-sm-12 control-label '> {{ __('Email') }}</label>
                <input type='email' id='input-email' wire:model.lazy='email' class="form-control  @error('email') is-invalid @enderror" placeholder='' autocomplete='on'>
                @error('email') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            <!-- Gender Input -->
            <div class='form-group'>
                <label for='input-gender' class='col-sm-12 control-label '> {{ __('Gender') }}</label>
                <select id='input-gender' wire:model.lazy='gender' class="form-control  @error('gender') is-invalid @enderror">
                    @foreach(getCrudConfig('Premember')->inputs()['gender']['select'] as $key => $value)
                        <option value='{{ $key }}'>{{ $value }}</option>
                    @endforeach
                </select>
                @error('gender') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            <!-- Date_of_birth Input -->
            <div class='form-group'>
                <label for='input-date_of_birth' class='col-sm-12 control-label '> {{ __('Date of Birth') }}</label>
                <input type='date' id='input-date_of_birth' wire:model.lazy='date_of_birth' class="form-control  @error('date_of_birth') is-invalid @enderror" autocomplete='on'>
                @error('date_of_birth') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            <!-- Civil_status Input -->
            <div class='form-group'>
                <label for='input-civil_status' class='col-sm-12 control-label '> {{ __('Civil Status') }}</label>
                <select id='input-civil_status' wire:model.lazy='civil_status' class="form-control  @error('civil_status') is-invalid @enderror">
                    @foreach(getCrudConfig('Premember')->inputs()['civil_status']['select'] as $key => $value)
                        <option value='{{ $key }}'>{{ $value }}</option>
                    @endforeach
                </select>
                @error('civil_status') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            <!-- Telephone_number Input -->
            <div class='form-group'>
                <label for='input-telephone_number' class='col-sm-12 control-label '> {{ __('Telephone Number') }}</label>
                <input type='text' id='input-telephone_number' wire:model.lazy='telephone_number' class="form-control  @error('telephone_number') is-invalid @enderror" placeholder='' autocomplete='on'>
                @error('telephone_number') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            <!-- Mobile_number Input -->
            <div class='form-group'>
                <label for='input-mobile_number' class='col-sm-12 control-label '> {{ __('Mobile Number') }}</label>
                <input type='text' id='input-mobile_number' wire:model.lazy='mobile_number' class="form-control  @error('mobile_number') is-invalid @enderror" placeholder='' autocomplete='on'>
                @error('mobile_number') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            <!-- Facebook_account Input -->
            <div class='form-group'>
                <label for='input-facebook_account' class='col-sm-12 control-label '> {{ __('Facebook Account') }}</label>
                <input type='text' id='input-facebook_account' wire:model.lazy='facebook_account' class="form-control  @error('facebook_account') is-invalid @enderror" placeholder='' autocomplete='on'>
                @error('facebook_account') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            <!-- Present_address Input -->
            <div class='form-group'>
                <label for='input-present_address' class='col-sm-12 control-label '> {{ __('Present Address') }}</label>
                <textarea id="input-present_address" wire:model.lazy='present_address' class="form-control  @error('present_address') is-invalid @enderror" placeholder='' autocomplete='on'></textarea>
                @error('present_address') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            <!-- Ofw_family_member Input -->
            <div class='form-group'>
                <label for='input-ofw_family_member' class='col-sm-12 control-label '> {{ __('OFW Family Member') }}</label>
                <select id='input-ofw_family_member' wire:model.lazy='ofw_family_member' class="form-control  @error('ofw_family_member') is-invalid @enderror">
                    @foreach(getCrudConfig('Premember')->inputs()['ofw_family_member']['select'] as $key => $value)
                        <option value='{{ $key }}'>{{ $value }}</option>
                    @endforeach
                </select>
                @error('ofw_family_member') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            <!-- Occupation Input -->
            <div class='form-group'>
                <label for='input-occupation' class='col-sm-12 control-label '> {{ __('Occupation') }}</label>
                <input type='text' id='input-occupation' wire:model.lazy='occupation' class="form-control  @error('occupation') is-invalid @enderror" placeholder='' autocomplete='on'>
                @error('occupation') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>

        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-info ml-4">{{ __('Create') }}</button>
            <a href="@route(getRouteName().'.premember.read')" class="btn btn-default float-left">{{ __('Cancel') }}</a>
        </div>
    </form>
</div>
