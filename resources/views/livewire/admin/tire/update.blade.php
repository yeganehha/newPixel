<div class="card">
    <div class="card-header p-0">
        <h3 class="card-title">{{ __('UpdateTitle', ['name' => __('Tire') ]) }}</h3>
        <div class="px-2 mt-4">
            <ul class="breadcrumb mt-3 py-3 px-4 rounded">
                <li class="breadcrumb-item"><a href="@route(getRouteName().'.home')" class="text-decoration-none">{{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item"><a href="@route(getRouteName().'.tire.read')" class="text-decoration-none">{{ __(\Illuminate\Support\Str::plural('Tire')) }}</a></li>
                <li class="breadcrumb-item active">{{ __('Update') }}</li>
            </ul>
        </div>
    </div>

    <form class="form-horizontal" wire:submit.prevent="update" enctype="multipart/form-data">

        <div class="card-body">

                        <!-- name Input -->
            <div class='form-group'>
                <label for='input-name' class='col-sm-2 control-label '> {{ __('name') }}</label>
                <input type='text' id='input-name' wire:model.lazy='name' class="form-control  @error('name') is-invalid @enderror" placeholder='' autocomplete='off'>
                @error('name') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            <!-- expire Input -->
            <div class='form-group'>
                <label for='input-expire' class='col-sm-2 control-label '> {{ __('expire') }}</label>
                <input type='number' id='input-expire' wire:model.lazy='expire' class="form-control  @error('expire') is-invalid @enderror" placeholder='day' autocomplete='off'>
                @error('expire') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            <!-- price Input -->
            <div class='form-group'>
                <label for='input-price' class='col-sm-2 control-label '> {{ __('price') }}</label>
                <input type='number' id='input-price' wire:model.lazy='price' class="form-control  @error('price') is-invalid @enderror" placeholder='toman' autocomplete='off'>
                @error('price') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            <!-- discord_roll_id Input -->
            <div class='form-group'>
                <label for='input-discord_roll_id' class='col-sm-2 control-label '> {{ __('discord_roll_id') }}</label>
                <input type='number' id='input-discord_roll_id' wire:model.lazy='discord_roll_id' class="form-control  @error('discord_roll_id') is-invalid @enderror" placeholder='' autocomplete='off'>
                @error('discord_roll_id') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>


        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-info ml-4">{{ __('Update') }}</button>
            <a href="@route(getRouteName().'.tire.read')" class="btn btn-default float-left">{{ __('Cancel') }}</a>
        </div>
    </form>
</div>
