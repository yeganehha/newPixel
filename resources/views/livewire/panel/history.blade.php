<div>
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
                    {{--                    <th>ویرایش</th>--}}
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
                        {{--                        <td>--}}
                        {{--                            <div class="d-none" id="H-{{ $Bhistory->id }}">{{ $Bhistory->history }}</div>--}}
                        {{--                            <span class="text-info" style="cursor: pointer"  onclick="document.getElementById('history').value = document.getElementById('H-{{ $Bhistory->id }}').innerHTML;">--}}
                        {{--                                <svg width="24px" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-2"></path></svg>--}}
                        {{--                            </span>--}}
                        {{--                        </td>--}}
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
                <label class="control-label">آیا مسلط به قوانین سرور و رول پلی هستید؟</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" wire:model.lazy="history.rules" @checked($history['rules']) id="inlineRadio1" value="0">
                    <label class="form-check-label" for="inlineRadio1">خیر</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" wire:model.lazy="history.rules" @checked($history['rules']) id="inlineRadio2" value="1">
                    <label class="form-check-label" for="inlineRadio2">بله</label>
                </div>
                <span class="text-danger">
                    @error('history.rules') تا زمانی که به قوانین مسلط نباشید، امکان تایید شما نیست! @enderror
                </span>
            </div>
            <div class="form-group">
                <label class="control-label">آیا متوجه هستید که قوانینی که در سرور نوشته شده فقط به طور خلاصه برای اطلاع عمومی می باشد و قوانین کلی گرچه نانوشته باشد با توجه به تصمیم ادمین خواهد بود؟</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" wire:model.lazy="history.admin" @checked($history['admin']) id="inlineRadio13" value="0">
                    <label class="form-check-label" for="inlineRadio13">خیر</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" wire:model.lazy="history.admin" @checked($history['admin']) id="inlineRadio23" value="1">
                    <label class="form-check-label" for="inlineRadio23">بله</label>
                </div>
                <span class="text-danger">
                    @error('history.admin') تا زمانی که تصمیم ادمین را قبول نداشته باشید، امکان تایید شما نیست! @enderror
                </span>
            </div>
            <div class="form-group">
                <label for="input-name" class="control-label ">نام و نام خانوادگی کاراکتر خود را بنویسید.</label>
                <input class="form-control"  wire:model.lazy="history.name" value="{{ $default_history }}">
                <span class="text-danger">
                    @error('history.name') وارد کردن این مورد الزامی است @enderror
                </span>
            </div>
            <div class="form-group">
                <label for="input-name" class=" control-label ">رول پلی کردن چه نقش هایی را دوست دارید و یک توضیح کامل درباره اهداف و برنامه های کاراکتر خود بنویسید</label>
                <textarea class="form-control" id="history" rows="10" placeholder="" autocomplete="off" wire:model.lazy="history.history" >{{ $default_history }}</textarea>
                <span class="text-danger">
                    @error('history.history') وارد کردن این مورد الزامی است @enderror
                </span>
            </div>
            <div class="form-group">
                <label for="input-name" class=" control-label ">ویژگی ها و توانایی هایی که در رول پلی میتوانید به کار ببرید را توضیح دهید.</label>
                <textarea class="form-control" id="history" rows="10" placeholder="" autocomplete="off" wire:model.lazy="history.ability" >{{ $default_history }}</textarea>
                <span class="text-danger">
                    @error('history.ability') وارد کردن این مورد الزامی است @enderror
                </span>
            </div>
            <div class="form-group">
                <label class="control-label">آیا با کلیات و جزئیات قوانین سرور موافق هستید؟ این قوانین ممکن است در طول زمان تغییر کنند.</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" wire:model.lazy="history.accept" @checked($history['accept']) id="inlineRadio12" value="0">
                    <label class="form-check-label" for="inlineRadio12">خیر</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" wire:model.lazy="history.accept" @checked($history['accept']) id="inlineRadio22" value="1">
                    <label class="form-check-label" for="inlineRadio22">بله</label>
                </div>
                <span class="text-danger">
                    @error('history.accept') تا زمانی که به قوانین موافق نباشید، امکان تایید شما نیست! @enderror
                </span>
            </div>
            <button type="submit" class="btn btn-info ml-4"  wire:click="save">ذخیره</button>
            <div wire:loading wire:target="save" class="text-info">
                در حال ذخیره سازی
            </div>
        @endif
    </div>
</div>
