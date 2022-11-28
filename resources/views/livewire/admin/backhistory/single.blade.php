<tr x-data="{ modalIsOpen : false }">
    <td class="">#{{ $backhistory->id }}</td>
    <td class="" style="diraction: ltr;">
        <img class="img-fluid  rounded-circle " width="50" height="50" src="{{ $backhistory->user->getAvatar() }}" alt="">
        {{ $backhistory->user->username }}#{{ $backhistory->user->discriminator }}
    </td>
    <td class="" style="diraction: ltr;">
        @if ( $backhistory->admin )
            <img class="img-fluid  rounded-circle " width="50" height="50" src="{{ $backhistory->admin->getAvatar() }}" alt="">
            {{ $backhistory->admin->username }}#{{ $backhistory->admin->discriminator }}
        @endif
    </td>
    <td class="">
        <button @click.prevent="modalIsOpen = true" class="btn text-info mt-1">
            <i class="icon-eye"></i>
        </button>
        <div x-show="modalIsOpen" class="cs-modal animate__animated animate__fadeIn">
            <div class="bg-white shadow rounded p-5" @click.away="modalIsOpen = false"  style="max-width: 85%;max-height: 90%;overflow-y: scroll;">
                {!! nl2br(e($backhistory->history)) !!}
                <div class="mt-5 d-flex justify-content-between">
                    <a wire:click.prevent="accept" @click.prevent="modalIsOpen = false" class="text-white btn btn-success shadow">تایید زندگی نامه</a>
                    <input type="text" class="form-control w-40" wire:model="reason" placeholder="علت رد">
                    <a wire:click.prevent="reject" @click.prevent="modalIsOpen = false" class="text-white btn btn-danger shadow">رد زندگی نامه</a>
                    <a @click.prevent="modalIsOpen = false" class="text-white btn btn-info shadow">بستن</a>
                </div>
            </div>
        </div>
    </td>
    <td class="">
        @if( $backhistory->status == 0 )
            <span class="text-warning">
                                    در حال بررسی
                                </span>
        @elseif( $backhistory->status == 1 )
            <span class="text-danger">
                                    رد شده
                                </span>
        @else
            <span class="text-success">
                                    تایید شده
                                </span>
        @endif
    </td>
    <td class="">{{ $backhistory->reason }}</td>
    <td class="">{{ $backhistory->accepted_time ? $backhistory->accepted_time->toJalali() : '' }}</td>

    @if(getCrudConfig('BackHistory')->delete or getCrudConfig('BackHistory')->update)
        <td>

            @if(getCrudConfig('BackHistory')->update && hasPermission(getRouteName().'.back-history.update', 1, 0, $backhistory))
                <a href="@route(getRouteName().'.back-history.update', $backhistory->id)" class="btn text-primary mt-1">
                    <i class="icon-pencil"></i>
                </a>
            @endif

            @if(getCrudConfig('BackHistory')->delete && hasPermission(getRouteName().'.back-history.delete', 1, 0, $backhistory))
                <button @click.prevent="modalIsOpen = true" class="btn text-danger mt-1">
                    <i class="icon-trash"></i>
                </button>
                <div x-show="modalIsOpen" class="cs-modal animate__animated animate__fadeIn">
                    <div class="bg-white shadow rounded p-5" @click.away="modalIsOpen = false" >
                        <h5 class="pb-2 border-bottom">{{ __('DeleteTitle', ['name' => __('BackHistory') ]) }}</h5>
                        <p>{{ __('DeleteMessage', ['name' => __('BackHistory') ]) }}</p>
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
