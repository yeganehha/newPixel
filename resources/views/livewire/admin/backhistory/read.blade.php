<div class="row"  wire:poll.60s>
    <div class="col-12">
        <div class="card">
            <div class="card-header p-0">
                <h3 class="card-title">{{ __('ListTitle', ['name' => __(\Illuminate\Support\Str::plural('BackHistory')) ]) }}</h3>

                <div class="px-2 mt-4">

                    <ul class="breadcrumb mt-3 py-3 px-4 rounded">
                        <li class="breadcrumb-item"><a href="@route(getRouteName().'.home')" class="text-decoration-none">{{ __('Dashboard') }}</a></li>
                        <li class="breadcrumb-item active">{{ __(\Illuminate\Support\Str::plural('BackHistory')) }}</li>
                    </ul>

                    <div class="row justify-content-between mt-4 mb-4">
                        @if(getCrudConfig('BackHistory')->create && hasPermission(getRouteName().'.back-history.create', 1, 0))
                        <div class="col-md-4 right-0">
                            <a href="@route(getRouteName().'.back-history.create')" class="btn btn-success">{{ __('CreateTitle', ['name' => __('BackHistory') ]) }}</a>
                        </div>
                        @endif
                        @if(getCrudConfig('BackHistory')->searchable())
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
                            <th scope="col" style='cursor: pointer' wire:click="sort('id')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'id') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'id') fa-sort-amount-up ml-2 @endif'></i> {{ __('id') }} </th>
                            <th scope="col">{{ __('User_id') }} </th>
                            <th scope="col"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'accepted_by') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'accepted_by') fa-sort-amount-up ml-2 @endif'></i> {{ __('Accepted_by') }} </th>
                            <th scope="col"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'history') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'history') fa-sort-amount-up ml-2 @endif'></i> {{ __('History') }} </th>
                            <th scope="col" style='cursor: pointer' wire:click="sort('status')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'status') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'status') fa-sort-amount-up ml-2 @endif'></i> {{ __('Status') }} </th>
                            <th scope="col"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'reason') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'reason') fa-sort-amount-up ml-2 @endif'></i> {{ __('Reason') }} </th>
                            <th scope="col" style='cursor: pointer' wire:click="sort('accepted_time')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'accepted_time') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'accepted_time') fa-sort-amount-up ml-2 @endif'></i> {{ __('Accepted_time') }} </th>

                            @if(getCrudConfig('BackHistory')->delete or getCrudConfig('BackHistory')->update)
                                <th scope="col">{{ __('Action') }}</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($backhistorys as $backhistory)
                            @livewire('admin.backhistory.single', [$backhistory], key($backhistory->id))
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="m-auto pt-3 pr-3">
                {{ $backhistorys->appends(request()->query())->links() }}
            </div>

            <div wire:loading wire:target="nextPage,gotoPage,previousPage" class="loader-page"></div>

        </div>
    </div>
</div>
