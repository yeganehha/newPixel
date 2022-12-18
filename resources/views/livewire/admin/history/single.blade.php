<tr x-data="{ modalIsOpen : false }">
    <td class="">#{{ $history->id }}</td>
    <td class="" style="diraction: ltr;">
        <img class="img-fluid  rounded-circle " width="50" height="50" src="{{ $history->user->getAvatar() }}" alt="">
        {{ $history->user->username }}#{{ $history->user->discriminator }}
    </td>
    <td class="" style="diraction: ltr;">
        @if ( $history->admin and $history->admin !== true)
            <img class="img-fluid  rounded-circle " width="50" height="50" src="{{ $history->admin->getAvatar() }}" alt="">
            {{ $history->admin->username }}#{{ $history->admin->discriminator }}
        @endif
    </td>
    <td class="">
        <button @click.prevent="modalIsOpen = true" class="btn text-info mt-1">
            <i class="icon-eye"></i>
        </button>
        <div x-show="modalIsOpen" class="cs-modal animate__animated animate__fadeIn">
            <div class="bg-white shadow rounded p-5" @click.away="modalIsOpen = false"  style="max-width: 85%;max-height: 90%;overflow-y: scroll;">
                <h4>نام کارکتر</h4>
                {!! nl2br(e($history->name)) !!}
                <hr>
                <h4>کارکتر های مد نظر</h4>
                {!! nl2br(e($history->history)) !!}
                <hr>
                <h4>ویزگی ها</h4>
                {!! nl2br(e($history->ability)) !!}
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
        @if( $history->status == 0 )
            <span class="text-warning">
                                    در حال بررسی
                                </span>
        @elseif( $history->status == 1 )
            <span class="text-danger">
                                    رد شده
                                </span>
        @else
            <span class="text-success">
                                    تایید شده
                                </span>
        @endif
    </td>
    <td class="">{{ $history->reason }}</td>
    <td class="">{{ $history->accepted_time ? $history->accepted_time->toJalali() : '' }}</td>

    @if(getCrudConfig('History')->delete or getCrudConfig('History')->update)
        <td>

            @if(getCrudConfig('History')->update && hasPermission(getRouteName().'.history.update', 1, 0, $history))
                <a href="@route(getRouteName().'.history.update', $history->id)" class="btn text-primary mt-1">
                    <i class="icon-pencil"></i>
                </a>
            @endif

            @if(getCrudConfig('History')->delete && hasPermission(getRouteName().'.history.delete', 1, 0, $history))
                <button @click.prevent="modalIsOpen = true" class="btn text-danger mt-1">
                    <i class="icon-trash"></i>
                </button>
                <div x-show="modalIsOpen" class="cs-modal animate__animated animate__fadeIn">
                    <div class="bg-white shadow rounded p-5" @click.away="modalIsOpen = false" >
                        <h5 class="pb-2 border-bottom">{{ __('DeleteTitle', ['name' => __('History') ]) }}</h5>
                        <p>{{ __('DeleteMessage', ['name' => __('History') ]) }}</p>
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
