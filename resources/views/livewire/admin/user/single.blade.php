<tr x-data="{ modalIsOpen : false }">
    <td class="">{{ $user->username }}</td>
    <td class="">{{ $user->discriminator }}<br>{{ $user->id }}</td>
    <td class="">{{ $user->email }}</td>
    <td><img class="img-fluid  rounded-circle " width="50" height="50" src="{{ $user->getAvatar() }}" alt=""></td>
    <td class="">{{ $user->tire->name }}</td>
    <td class="">{{ $user->active_from }}</td>
    <td class="">{{ $user->expireAtHumanFormat() }}</td>
    @if(getCrudConfig('User')->delete or getCrudConfig('User')->update or hasPermission(getRouteName().'.admins.update', true))
        <td>

            @if(hasPermission(getRouteName().'.admins.update', true))
                <a href="@route('upgradeToAdmin', $user->id)" class="btn text-primary mt-1">
                    <i class="fa fa-user-secret"></i>
                </a>
            @endif
            @if(getCrudConfig('User')->update && hasPermission(getRouteName().'.user.update', 1, 0, $user))
                <a href="@route(getRouteName().'.user.update', $user->id)" class="btn text-primary mt-1">
                    <i class="icon-pencil"></i>
                </a>
            @endif

            @if(getCrudConfig('User')->delete && hasPermission(getRouteName().'.user.delete', 1, 0, $user))
                <button @click.prevent="modalIsOpen = true" class="btn text-danger mt-1">
                    <i class="icon-trash"></i>
                </button>
                <div x-show="modalIsOpen" class="cs-modal animate__animated animate__fadeIn">
                    <div class="bg-white shadow rounded p-5" @click.away="modalIsOpen = false" >
                        <h5 class="pb-2 border-bottom">{{ __('DeleteTitle', ['name' => __('User') ]) }}</h5>
                        <p>{{ __('DeleteMessage', ['name' => __('User') ]) }}</p>
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
