<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header p-0">
                <h3 class="card-title">{{ __('ListTitle', ['name' => __(\Illuminate\Support\Str::plural('User')) ]) }}</h3>

                <div class="px-2 mt-4">

                    <ul class="breadcrumb mt-3 py-3 px-4 rounded">
                        <li class="breadcrumb-item"><a href="@route(getRouteName().'.home')" class="text-decoration-none">{{ __('Dashboard') }}</a></li>
                        <li class="breadcrumb-item active">{{ __(\Illuminate\Support\Str::plural('User')) }}</li>
                    </ul>

                    <div class="row justify-content-between mt-4 mb-4">
                        @if(getCrudConfig('User')->create && hasPermission(getRouteName().'.user.create', 1, 0))
                        <div class="col-md-4 right-0">
                            <a href="@route(getRouteName().'.user.create')" class="btn btn-success">{{ __('CreateTitle', ['name' => __('User') ]) }}</a>
                        </div>
                        @endif
                        @if(getCrudConfig('User')->searchable())
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
                            <th scope="col"> {{ __('username') }} </th>
                            <th scope="col"> {{ __('discriminator') }} </th>
                            <th scope="col"> {{ __('email') }} </th>
                            <th scope="col"> {{ __('Users profile') }} </th>
                            <th scope="col"> پکیج فعال </th>
                            <th scope="col" style='cursor: pointer' wire:click="sort('active_from')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'active_from') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'active_from') fa-sort-amount-up ml-2 @endif'></i> {{ __('Active_from') }} </th>
                            <th scope="col" style='cursor: pointer' wire:click="sort('expire_at')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'expire_at') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'expire_at') fa-sort-amount-up ml-2 @endif'></i> {{ __('Expire_at') }} </th>

                            @if(getCrudConfig('User')->delete or getCrudConfig('User')->update or hasPermission(getRouteName().'.admins.update', true) )
                                <th scope="col">{{ __('Action') }}</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            @livewire('admin.user.single', [$user], key($user->id))
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="m-auto pt-3 pr-3">
                {{ $users->appends(request()->query())->links() }}
            </div>

            <div wire:loading wire:target="nextPage,gotoPage,previousPage" class="loader-page"></div>

        </div>
    </div>
</div>
