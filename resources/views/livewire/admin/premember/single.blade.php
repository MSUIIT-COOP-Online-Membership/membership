<tr x-data="{ modalIsOpen : false }">
    <td class="">{{ $premember->fname }}</td>
    <td class="">{{ $premember->mname }}</td>
    <td class="">{{ $premember->lname }}</td>
    <td class="">{{ $premember->gender }}</td>
    <td class="">{{ $premember->date_of_birth }}</td>
    <td class="">{{ $premember->civil_status }}</td>
    <td class="">{{ $premember->email }}</td>
    <td class="">{{ $premember->telephone_number }}</td>
    <td class="">{{ $premember->mobile_number }}</td>
    <td class="">{{ $premember->facebook_account }}</td>
    <td class="">{{ $premember->present_address }}</td>
    <td class="">{{ $premember->ofw_family_member }}</td>
    <td class="">{{ $premember->occupation }}</td>
    
    @if(getCrudConfig('Premember')->delete or getCrudConfig('Premember')->update)
        <td>

            @if(getCrudConfig('Premember')->update && hasPermission(getRouteName().'.premember.update', 1, 1, $premember))
                <a href="@route(getRouteName().'.premember.update', $premember->id)" class="btn text-primary mt-1">
                    <i class="icon-pencil"></i>
                </a>
            @endif

            @if(getCrudConfig('Premember')->delete && hasPermission(getRouteName().'.premember.delete', 1, 1, $premember))
                <button @click.prevent="modalIsOpen = true" class="btn text-danger mt-1">
                    <i class="icon-trash"></i>
                </button>
                <div x-show="modalIsOpen" class="cs-modal animate__animated animate__fadeIn">
                    <div class="bg-white shadow rounded p-5" @click.away="modalIsOpen = false" >
                        <h5 class="pb-2 border-bottom">{{ __('DeleteTitle', ['name' => __('Premember') ]) }}</h5>
                        <p>{{ __('DeleteMessage', ['name' => __('Premember') ]) }}</p>
                        <div class="mt-5 d-flex justify-content-between">
                            <a wire:click.prevent="delete" class="text-white btn btn-success shadow">{{ __('Yes, Delete it.') }}</a>
                            <a @click.prevent="modalIsOpen = false" class="text-white btn btn-danger shadow">{{ __('No, Cancel it.') }}</a>
                        </div>
                    </div>
                </div>
            @endif
        </td>
    @endif
</tr>
