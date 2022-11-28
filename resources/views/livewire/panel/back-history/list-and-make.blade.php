<div>
    <div class="card-body card-body">
        @if($is_accept)
            <div class="alert alert-success">
                زندگی نامه کارکتر شما تایید شده است.
            </div>
        @else
            <div class="alert alert-info">
                جهت ورود به سرور نیاز است زندگی نامه کارکتر شما تایید شود!
            </div>
            <div class="form-group">
                <label for="input-name" class="col-sm-2 control-label ">زندگی نامه:</label>
                <textarea class="form-control" id="history" rows="10" placeholder="" autocomplete="off" wire:model.lazy="history.history" >{{ $default_history }}</textarea>
                <span class="text-danger">
                    @error('history.history') {{ $message }} @enderror
                </span>
            </div>
            <button type="submit" class="btn btn-info ml-4"  wire:click="save">ذخیره</button>
            <div wire:loading wire:target="save" class="text-info">
                در حال ذخیره سازی
            </div>
        @endif
    </div>

    <div class="card-body card-body">
        <div class="table-responsive">
            <table class="table display mb-4 table-responsive-xl card-table no-footer">
                <thead>
                <tr>
                    <th></th>
                    <th>تاریخ ارسال</th>
                    <th>تاریخ بررسی</th>
                    <th>وضعیت</th>
                    <th>توضیحات</th>
                    <th>ویرایش</th>
                </tr>
                </thead>
                <tbody>
                @forelse($histories as $Bhistory)
                    <tr>
                        <td>
                            #{{ $Bhistory->id }}
                        </td>
                        <td>{{ $Bhistory->updated_at->toJalali()->formatJalaliDatetime() }}</td>
                        <td>{{ $Bhistory->accepted_time ? $Bhistory->accepted_time->toJalali()->formatJalaliDatetime() : '' }}</td>
                        <td>
                            @if( $Bhistory->status == 0 )
                                <span class="text-warning">
                                    در حال بررسی
                                </span>
                            @elseif( $Bhistory->status == 1 )
                                <span class="text-danger">
                                    رد شده
                                </span>
                            @else
                                <span class="text-success">
                                    تایید شده
                                </span>
                            @endif
                        </td>
                        <td>
                            {{ $Bhistory->reason }}
                        </td>
                        <td>
                            <div class="d-none" id="H-{{ $Bhistory->id }}">{{ $Bhistory->history }}</div>
                            <span class="text-info" style="cursor: pointer"  onclick="document.getElementById('history').value = document.getElementById('H-{{ $Bhistory->id }}').innerHTML;">
                                <svg width="24px" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-2"></path></svg>
                            </span>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">
                            <div class="alert alert-info w-100 text-center">
                                شما هنوز زندگی نامه ای ارسال نکردید!
                            </div>
                        </td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
