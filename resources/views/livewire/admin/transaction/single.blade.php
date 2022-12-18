<tr x-data="{ modalIsOpen : false }">
    <td class="">#{{ $transaction->id }}</td>
    <td class="" style="diraction: ltr;">
        <img class="img-fluid  rounded-circle " width="50" height="50" src="{{ $transaction->user->getAvatar() }}" alt="">
        {{ $transaction->user->username }}#{{ $transaction->user->discriminator }}<br>{{ $transaction->created_at->toJalali() }}<br>{{ $transaction->created_at }}
    </td>
    <td class="">{{ $transaction->tire ? $transaction->tire->name : 'حمایت مالی' }}</td>
    <td class="">{{ $transaction->lastTire ? $transaction->lastTire->name : "-" }}</td>
    <td class="">{{ number_format($transaction->amount) }}</td>
    <td class="">{{ number_format($transaction->discount) }}</td>
    <td class=""><span class="badge badge-{{ $transaction->is_pay ? 'success' : 'danger' }} font-14 ">{{ $transaction->is_pay ? __('پرداخت شده') : __('ناموفق') }}</span></td>
    <td class="">{{ $transaction->trans_id }}<br>{{ $transaction->result }}</td>

    @if(getCrudConfig('Transaction')->delete or getCrudConfig('Transaction')->update)
        <td>

            @if(getCrudConfig('Transaction')->update && hasPermission(getRouteName().'.transaction.update', 1, 0, $transaction))
                <a href="@route(getRouteName().'.transaction.update', $transaction->id)" class="btn text-primary mt-1">
                    <i class="icon-pencil"></i>
                </a>
            @endif

            @if(getCrudConfig('Transaction')->delete && hasPermission(getRouteName().'.transaction.delete', 1, 0, $transaction))
                <button @click.prevent="modalIsOpen = true" class="btn text-danger mt-1">
                    <i class="icon-trash"></i>
                </button>
                <div x-show="modalIsOpen" class="cs-modal animate__animated animate__fadeIn">
                    <div class="bg-white shadow rounded p-5" @click.away="modalIsOpen = false" >
                        <h5 class="pb-2 border-bottom">{{ __('DeleteTitle', ['name' => __('Transaction') ]) }}</h5>
                        <p>{{ __('DeleteMessage', ['name' => __('Transaction') ]) }}</p>
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
