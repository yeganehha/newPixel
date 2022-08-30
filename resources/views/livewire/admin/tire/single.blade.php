<tr x-data="{ modalIsOpen : false }">
    <td class="">{{ $tire->name }}</td>
    <td class="">{{ $tire->expire }}</td>
    <td class="">{{ $tire->price }}</td>
    
    @if(getCrudConfig('Tire')->delete or getCrudConfig('Tire')->update)
        <td>

            @if(getCrudConfig('Tire')->update && hasPermission(getRouteName().'.tire.update', 1, 0, $tire))
                <a href="@route(getRouteName().'.tire.update', $tire->id)" class="btn text-primary mt-1">
                    <i class="icon-pencil"></i>
                </a>
            @endif

            @if(getCrudConfig('Tire')->delete && hasPermission(getRouteName().'.tire.delete', 1, 0, $tire))
                <button @click.prevent="modalIsOpen = true" class="btn text-danger mt-1">
                    <i class="icon-trash"></i>
                </button>
                <div x-show="modalIsOpen" class="cs-modal animate__animated animate__fadeIn">
                    <div class="bg-white shadow rounded p-5" @click.away="modalIsOpen = false" >
                        <h5 class="pb-2 border-bottom">{{ __('DeleteTitle', ['name' => __('Tire') ]) }}</h5>
                        <p>{{ __('DeleteMessage', ['name' => __('Tire') ]) }}</p>
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
