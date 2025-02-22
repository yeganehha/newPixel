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
        <h4>نام کامل متقاضی</h4>
        {!! nl2br(e($history->realname)) !!}
        <hr>

        <h4>سن متقاضی</h4>
        {!! nl2br(e($history->age)) !!}
        <hr>

        <h4>جنسیت متقاضی</h4>
        {!! nl2br(e($history->gender)) !!}
        <hr>

        <h4>از چه طریقی با رترو آشنا شدید؟</h4>
        {!! nl2br(e($history->source)) !!}
        <hr>

        @if($history->source === 'friend')
            <h4>نام معرف</h4>
            {!! nl2br(e($history->referral)) !!}
            <hr>
        @endif

        <h4>نام کامل کاراکتر</h4>
        {!! nl2br(e($history->character_name)) !!}
        <hr>

        <h4>تاریخ تولد کاراکتر</h4>
        {!! nl2br(e($history->birthdate)) !!}
        <hr>

        <h4>جنسیت کاراکتر</h4>
        {!! nl2br(e($history->character_gender)) !!}
        <hr>

        <h4>ملیت کاراکتر</h4>
        {!! nl2br(e($history->nationality)) !!}
        <hr>

        <h4>بک استوری کاراکتر</h4>
        {!! nl2br(e($history->backstory)) !!}
        <hr>

        <h4>برنامه رول پلی</h4>
        {!! nl2br(e($history->roleplay_plan)) !!}
        <hr>

        <h4>آیا تمایل به شرکت در استوری لاین ها و محتواهای سرور را دارید؟</h4>
        {!! nl2br(e($history->storyline_participation == 1 ? 'بله' : 'خیر')) !!}
        <hr>

        @if($history->storyline_participation == 1)
            <h4>برنامه برای افزودن به استوری لاین‌ها و محتواها</h4>
            {!! nl2br(e($history->storyline_plan)) !!}
            <hr>
        @endif

        <h4>آیا تجربه رول پلی در سرورهای فایوم را داشته اید؟</h4>
        {!! nl2br(e($history->fivem_experience)) !!}
        <hr>

        <h4>رول پلی را از زبان خود توصیف کنید</h4>
        {!! nl2br(e($history->roleplay_definition)) !!}
        <hr>

        <h4>Block RP را با کلمات خود شرح دهید</h4>
        {!! nl2br(e($history->block_rp)) !!}
        <hr>

        <h4>دانسته‌ها درباره دهه 80 میلادی</h4>
        {!! nl2br(e($history->eighties_knowledge)) !!}
        <hr>

        <h4>آیا یک میکروفون با کیفیت مناسب برای آرپی در سرور دارید؟</h4>
        {!! nl2br(e($history->microphone_quality == 1 ? 'بله' : 'خیر')) !!}
        <hr>

        <h4>لینک کانال تولید کننده محتوا</h4>
        {!! nl2br(e($history->content_creator_link)) !!}
        <hr>

        <h4>پذیرش قوانین سرور</h4>
        {!! nl2br(e($history->accept_terms == 1 ? 'تایید شده' : 'رد شده')) !!}
        <hr>

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
