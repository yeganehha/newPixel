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
                            شما هنوز فرمی ارسال نکرده اید
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
        جهت ورود به سرور نیاز است فرم شما تایید شود!
        </div>
            <div class="form-group">
                <label class="control-label">لطفا پاسخ خود را به صورت فینگلیش به هیچ عنوان ننویسید</label>
                <label class="control-label">توجه داشته باشید استفاده از هرگونه هوش مصنوعی یا گوگل در پاسخ به سوالات فرم منجر به رد شدن درخواست شما به طور کلی خواهد شد، ضمنا پر کردن این فرم به منزله شناخت اولیه از شما توسط تیم Retro و در صورت لزوم امکان نیاز به صحبت در دیسکورد با شخص متقاضی خواهد بود
                </label>
            </div>
            <div class="form-group">

            <div class="text-center mb-4">
    <h3 class="control-label">OOC Information</h3>
    <p class="control-label">اطلاعات متقاضی به طور کامل وارد شود. در صورت مغایرت دسترسی شخص پذیرفته شده گرفته خواهد شد.</p>
</div>

                <label for="input-realname" class="control-label ">نام کامل متقاضی</label>
                <input class="form-control"  wire:model.lazy="history.realname" value="{{ $default_history }}">
                <span class="text-danger">
                    @error('history.realname') وارد کردن این مورد الزامی است @enderror
                </span>
            </div>
            <div class="form-group">
            <label for="input-age" class="control-label ">سن متقاضی</label>
            <input class="form-control"  wire:model.lazy="history.age" value="{{ $default_history }}">
            <span class="text-danger">
                @error('history.age') وارد کردن این مورد الزامی است @enderror
            </span>
            <div class="form-group">
                <label class="control-label">جنسیت متقاضی</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" wire:model.lazy="history.gender" @checked($history['gender'] == 'male') id="inlineRadioMale" value="male" name="gender">
                    <label class="form-check-label" for="inlineRadioMale">مرد</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" wire:model.lazy="history.gender" @checked($history['gender'] == 'female') id="inlineRadioFemale" value="female" name="gender">
                    <label class="form-check-label" for="inlineRadioFemale">زن</label>
                </div>
                <span class="text-danger">
                    @error('history.gender') انتخاب جنسیت الزامی است @enderror
                </span>
            </div>

            <div class="form-group">
                <label for="input-source" class="control-label">از چه طریقی با رترو آشنا شدید؟</label>
                <select class="form-control" wire:model.lazy="history.source" id="input-source">
                    <option value="">انتخاب کنید</option>
                    <option value="friend">از طریق دوست</option>
                    <option value="social_media">از طریق رسانه‌های اجتماعی</option>
                    <option value="advertisement">از طریق تبلیغات</option>
                    <option value="other">روش دیگری</option>
                </select>
                <span class="text-danger">
                    @error('history.source') انتخاب یک روش الزامی است @enderror
                </span>
            </div>

            <div class="form-group" x-show="history.source === 'friend'">
                <label for="input-referral" class="control-label">نام معرف (در صورت وجود)</label>
                <input class="form-control" wire:model.lazy="history.referral" id="input-referral" placeholder="نام معرف خود را وارد کنید">
                <span class="text-danger">
                    @error('history.referral') وارد کردن این مورد در صورت انتخاب 'از طریق دوست' الزامی است @enderror
                </span>
            </div>
            <div class="text-center mb-4">
    <h3 class="control-label">IC Information</h3>
    <p class="control-label">اطلاعات کاراکتر به طور کامل وارد شود. در صورت مغایرت دسترسی شخص پذیرفته شده گرفته خواهد شد</p>
</div>

            <div class="form-group">
                <label for="input-character-name" class="control-label">نام کامل کاراکتر</label>
                <input class="form-control" wire:model.lazy="history.character_name" id="input-character-name" placeholder="نام کامل کاراکتر خود را وارد کنید">
                <span class="text-danger">
                    @error('history.character_name') وارد کردن این مورد الزامی است @enderror
                </span>
            </div>

            <div class="form-group">
                <label for="input-birthdate" class="control-label">تاریخ تولد کاراکتر</label>
                <input class="form-control" wire:model.lazy="history.birthdate" id="input-birthdate" type="date">
                <span class="text-danger">
                    @error('history.birthdate') وارد کردن تاریخ تولد الزامی است @enderror
                </span>
            </div>

            <div class="form-group">
                <label for="input-character-gender" class="control-label">جنسیت کاراکتر</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" wire:model.lazy="history.character_gender" @checked($history['character_gender'] == 'male') id="inlineRadioMale" value="male" name="character_gender">
                    <label class="form-check-label" for="inlineRadioMale">مرد</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" wire:model.lazy="history.character_gender" @checked($history['character_gender'] == 'female') id="inlineRadioFemale" value="female" name="character_gender">
                    <label class="form-check-label" for="inlineRadioFemale">زن</label>
                </div>
                <span class="text-danger">
                    @error('history.character_gender') انتخاب جنسیت الزامی است @enderror
                </span>
            </div>

            <div class="form-group">
                <label for="input-nationality" class="control-label">ملیت کاراکتر</label>
                <input class="form-control" wire:model.lazy="history.nationality" id="input-nationality" placeholder="ملیت کاراکتر را وارد کنید">
                <span class="text-danger">
                    @error('history.nationality') وارد کردن ملیت الزامی است @enderror
                </span>
            </div>

            <div class="form-group">
                <label for="input-backstory" class="control-label">بک استوری کامل کاراکتر را بنویسید (حداقل 200 کلمه)</label>
                <textarea class="form-control" id="input-backstory" rows="5" placeholder="بک استوری کاراکتر خود را وارد کنید" wire:model.lazy="history.backstory"></textarea>
                <span class="text-danger">
                    @error('history.backstory') وارد کردن بک استوری الزامی است و باید حداقل 200 کلمه باشد @enderror
                </span>
            </div>

            <div class="form-group">
                <label for="input-roleplay-plan" class="control-label">برنامه خود برای رول پلی و آینده کاراکتر در سرور را به طور خلاصه شرح دهید</label>
                <textarea class="form-control" id="input-roleplay-plan" rows="5" placeholder="برنامه رول پلی و آینده کاراکتر را وارد کنید" wire:model.lazy="history.roleplay_plan"></textarea>
                <span class="text-danger">
                    @error('history.roleplay_plan') وارد کردن برنامه رول پلی الزامی است @enderror
                </span>
            </div>
        <!-- لیبل 1 -->
        <div class="text-center mb-4">
    <h3 class="control-label">Additional Questions</h3>
    <p class="control-label">به سوالات زیر با دقت و با کلمات خودتان پاسخ دهید</p>
</div>

            <!-- سوال 2 با دو گزینه بله و خیر -->
            <div class="form-group">
                <label class="control-label">در صورت ورود به سرور، آیا تمایل به شرکت در استوری لاین ها و محتواهای سرور را دارید؟</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" wire:model.lazy="history.storyline_participation" id="storylineYes" value="1">
                    <label class="form-check-label" for="storylineYes">بله</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" wire:model.lazy="history.storyline_participation" id="storylineNo" value="0">
                    <label class="form-check-label" for="storylineNo">خیر</label>
                </div>
                <span class="text-danger">
                    @error('history.storyline_participation') انتخاب یکی از گزینه‌ها الزامی است @enderror
                </span>
            </div>

            <!-- سوال 3 -->
            <div class="form-group" x-show="history.storyline_participation === '1'">
                <label for="input-storyline-plan" class="control-label">در صورتی که پاسخ سوال بالا را "بله" انتخاب کرده اید، برنامه خود را برای افزودن به این محتواها و استوری لاین ها بنویسید. (الزامی نیست)</label>
                <textarea class="form-control" id="input-storyline-plan" rows="5" wire:model.lazy="history.storyline_plan"></textarea>
                <span class="text-danger">
                    @error('history.storyline_plan') @enderror
                </span>
            </div>

            <!-- سوال 4 -->
            <div class="form-group">
                <label for="input-fivem-experience" class="control-label">آیا تجربه رول پلی در دیگر سرورهای فایوم را داشته اید؟ اگر بله نام سرورها را بنویسید</label>
                <input class="form-control" wire:model.lazy="history.fivem_experience" id="input-fivem-experience" placeholder="نام سرورها را وارد کنید">
                <span class="text-danger">
                    @error('history.fivem_experience') @enderror
                </span>
            </div>

            <!-- سوال 5 -->
            <div class="form-group">
                <label for="input-roleplay-definition" class="control-label">رول پلی را از زبان خود توصیف کنید</label>
                <textarea class="form-control" id="input-roleplay-definition" rows="5" wire:model.lazy="history.roleplay_definition"></textarea>
                <span class="text-danger">
                    @error('history.roleplay_definition') وارد کردن این مورد الزامی است @enderror
                </span>
            </div>

            <!-- سوال 6 -->
            <div class="form-group">
                <label for="input-block-rp" class="control-label">Block RP را با کلمات خود شرح دهید</label>
                <textarea class="form-control" id="input-block-rp" rows="5" wire:model.lazy="history.block_rp"></textarea>
                <span class="text-danger">
                    @error('history.block_rp') وارد کردن این مورد الزامی است @enderror
                </span>
            </div>

            <!-- سوال 7 -->
            <div class="form-group">
                <label for="input-80s-knowledge" class="control-label">هر آنچه که از آمریکای دهه 80 میلادی می‌دانید توصیف کنید (حداقل 100 کلمه)</label>
                <textarea class="form-control" id="input-80s-knowledge" rows="5" wire:model.lazy="history.eighties_knowledge"></textarea>
                <span class="text-danger">
                    @error('history.eighties_knowledge') وارد کردن این مورد الزامی است و باید حداقل 100 کلمه باشد @enderror
                </span>
            </div>

            <!-- سوال 8 -->
            <div class="form-group">
                <label class="control-label">آیا یک میکروفون با کیفیت مناسب برای آرپی در سرور دارید؟</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" wire:model.lazy="history.microphone_quality" id="microphoneYes" value="1">
                    <label class="form-check-label" for="microphoneYes">بله</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" wire:model.lazy="history.microphone_quality" id="microphoneNo" value="0">
                    <label class="form-check-label" for="microphoneNo">خیر</label>
                </div>
                <span class="text-danger">
                    @error('history.microphone_quality') انتخاب یکی از گزینه‌ها الزامی است @enderror
                </span>
            </div>

            <!-- سوال 9 -->
            <div class="form-group">
                <label for="input-content-creator-link" class="control-label">در صورتی که تولید کننده محتوا یا استریمر هستید، لینک کانال خود را وارد کنید ( توییچ، یوتیوب، آپارات و ...)</label>
                <input class="form-control" wire:model.lazy="history.content_creator_link" id="input-content-creator-link" placeholder="لینک کانال خود را وارد کنید">
                <span class="text-danger">
                    @error('history.content_creator_link') @enderror
                </span>
            </div>

            <!-- سوال 10 -->
            <div class="form-group">
                <label class="control-label">
                    10- این‌جانب بدین وسیله تمامی قوانین سرور رترو را می‌پذیرم و متعهد به رعایت حریم خصوصی و احترام به اعضای این کامیونیتی می‌شوم. بدیهی است که تمامی قوانین سرور رترو به‌صورت کاملاً داینامیک (متغیر)  بوده و متقابلاً مجازات مرتبط با آن نیز بنا بر نظر تیم رترو متفاوت خواهد بود
                </label>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" wire:model.lazy="history.accept_terms" id="acceptTerms">
                    <label class="form-check-label" for="acceptTerms">من قوانین سرور را می‌پذیرم</label>
                </div>
                <span class="text-danger">
                    @error('history.accept_terms') برای ادامه باید قوانین سرور را بپذیرید @enderror
                </span>
            </div>

            <!-- سوال 11 -->
            <div class="form-group">
    <label class="control-label" style="display: block; margin-top: 20px; color: red;">
        لطفا توجه داشته باشید، پذیرفته شدن شما در این فرم درخواست به منزله دسترسی دائمی شما به امکانات کامیونیتی و سرور رول پلی رترو نخواهد بود و در صورت مشاهده هرگونه مغایرت و تخطی در عمل شما با اطلاعاتی که در این فرم وارد کرده اید، تیم رترو بنا بر شرایط مربوطه اختیار منع شما را به طور کامل خواهد داشت
    </label>
</div>





            <button type="submit" class="btn btn-info ml-4"  wire:click="save">ارسال درخواست</button>
            <div wire:loading wire:target="save" class="text-info">
                در حال ذخیره سازی
            </div>
        @endif
    </div>
</div>
