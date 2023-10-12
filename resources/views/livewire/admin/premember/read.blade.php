<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header p-0">
                <h3 class="card-title">{{ __('ListTitle', ['name' => __(\Illuminate\Support\Str::plural('Premember')) ]) }}</h3>

                <div class="px-2 mt-4">

                    <ul class="breadcrumb mt-3 py-3 px-4 rounded">
                        <li class="breadcrumb-item"><a href="@route(getRouteName().'.home')" class="text-decoration-none">{{ __('Dashboard') }}</a></li>
                        <li class="breadcrumb-item active">{{ __(\Illuminate\Support\Str::plural('Premember')) }}</li>
                    </ul>

                    <div class="row justify-content-between mt-4 mb-4">
                        @if(getCrudConfig('Premember')->create && hasPermission(getRouteName().'.premember.create', 1, 1))
                        <div class="col-md-4 right-0">
                            <a href="@route(getRouteName().'.premember.create')" class="btn btn-success">{{ __('CreateTitle', ['name' => __('Premember') ]) }}</a>
                        </div>
                        @endif
                        @if(getCrudConfig('Premember')->searchable())
                        <div class="col-md-4">
                            <div class="input-group">
                                <input type="text" class="form-control" @if(config('easy_panel.lazy_mode')) wire:model.lazy="search" @else wire:model="search" @endif placeholder="{{ __('Search') }}" value="{{ request('search') }}">
                                <div class="input-group-append">
                                    <button class="btn btn-default">
                                        <a wire:target="search" wire:loading.remove><i class="fa fa-search"></i></a>
                                        <a wire:loading wire:target="search"><i class="fas fa-spinner fa-spin" ></i></a>
                                    </button>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="card-body table-responsive p-0">
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th scope="col" style='cursor: pointer' wire:click="sort('fname')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'fname') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'fname') fa-sort-amount-up ml-2 @endif'></i> {{ __('First Name') }} </th>
                            <th scope="col" style='cursor: pointer' wire:click="sort('mname')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'mname') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'mname') fa-sort-amount-up ml-2 @endif'></i> {{ __('Middle Name') }} </th>
                            <th scope="col" style='cursor: pointer' wire:click="sort('lname')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'lname') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'lname') fa-sort-amount-up ml-2 @endif'></i> {{ __('Last Name') }} </th>
                            <th scope="col" style='cursor: pointer' wire:click="sort('gender')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'gender') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'gender') fa-sort-amount-up ml-2 @endif'></i> {{ __('Gender') }} </th>
                            <th scope="col" style='cursor: pointer' wire:click="sort('date_of_birth')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'date_of_birth') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'date_of_birth') fa-sort-amount-up ml-2 @endif'></i> {{ __('Date of Birth') }} </th>
                            <th scope="col" style='cursor: pointer' wire:click="sort('civil_status')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'civil_status') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'civil_status') fa-sort-amount-up ml-2 @endif'></i> {{ __('Civil Status') }} </th>
                            <th scope="col" style='cursor: pointer' wire:click="sort('email')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'email') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'email') fa-sort-amount-up ml-2 @endif'></i> {{ __('Email Address') }} </th>
                            <th scope="col" style='cursor: pointer' wire:click="sort('telephone_number')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'telephone_number') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'telephone_number') fa-sort-amount-up ml-2 @endif'></i> {{ __('Telephone Number') }} </th>
                            <th scope="col" style='cursor: pointer' wire:click="sort('mobile_number')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'mobile_number') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'mobile_number') fa-sort-amount-up ml-2 @endif'></i> {{ __('Mobile Number') }} </th>
                            <th scope="col" style='cursor: pointer' wire:click="sort('facebook_account')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'facebook_account') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'facebook_account') fa-sort-amount-up ml-2 @endif'></i> {{ __('Facebook Account Name') }} </th>
                            <th scope="col" style='cursor: pointer' wire:click="sort('present_address')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'present_address') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'present_address') fa-sort-amount-up ml-2 @endif'></i> {{ __('Present Address') }} </th>
                            <th scope="col" style='cursor: pointer' wire:click="sort('ofw_family_member')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'ofw_family_member') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'ofw_family_member') fa-sort-amount-up ml-2 @endif'></i> {{ __('OFW Family Member') }} </th>
                            <th scope="col" style='cursor: pointer' wire:click="sort('occupation')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'occupation') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'occupation') fa-sort-amount-up ml-2 @endif'></i> {{ __('Occupation') }} </th>
                            
                            @if(getCrudConfig('Premember')->delete or getCrudConfig('Premember')->update)
                                <th scope="col">{{ __('Action') }}</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($premembers as $premember)
                            @livewire('admin.premember.single', [$premember], key($premember->id))
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="m-auto pt-3 pr-3">
                {{ $premembers->appends(request()->query())->links() }}
            </div>

            <div wire:loading wire:target="nextPage,gotoPage,previousPage" class="loader-page"></div>

        </div>
    </div>
</div>
