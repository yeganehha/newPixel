<?php

namespace App\Http\Livewire\Panel;

use App\Models\History as backHistory;
use Livewire\Component;

class History extends Component
{

    public $history ;
    public $histories ;
    public $is_accept ;
    public $default_history = null ;
    public $save = false ;

    protected $rules = [
        'history.realname' => 'required|string', // نام کامل متقاضی
        'history.age' => 'required|integer|min:18',
        'history.gender' => 'required|in:male,female', // جنسیت متقاضی
        'history.source' => 'required|string', // نحوه آشنایی با رترو
        'history.referral' => 'nullable|string', // نام معرف
        'history.character_name' => 'required|string', // نام کامل کاراکتر
        'history.birthdate' => 'required|date', // تاریخ تولد کاراکتر
        'history.character_gender' => 'required|in:male,female', // جنسیت کاراکتر
        'history.nationality' => 'required|string', // ملیت کاراکتر
        'history.backstory' => 'required|string|min:200', // بک استوری کاراکتر
        'history.roleplay_plan' => 'required|string', // برنامه رول پلی
        'history.storyline_participation' => 'required|in:0,1', // تمایل به شرکت در استوری لاین
        'history.storyline_plan' => 'nullable|string', // برنامه برای افزودن به استوری لاین‌ها
        'history.fivem_experience' => 'nullable|string', // تجربه رول پلی در سرورهای فایوم
        'history.roleplay_definition' => 'required|string', // تعریف رول پلی
        'history.block_rp' => 'required|string', // شرح Block RP
        'history.eighties_knowledge' => 'required|string|min:100', // دانسته‌ها درباره دهه 80 میلادی
        'history.microphone_quality' => 'required|in:0,1', // کیفیت میکروفون
        'history.content_creator_link' => 'nullable|url', // لینک کانال تولید کننده محتوا
        'history.accept_terms' => 'required|in:1', // پذیرش قوانین سرور
    ];


    public function updated($field)
    {
        $this->validateOnly($field);
    }
    public function save()
    {
        if ( ! $this->is_accept) {
            $this->validate();
            $this->history->user_id = auth()->id();
            $this->history->accepted_time = null;
            $this->history->save();
            $this->save = true;
            $this->histories = Auth()->user()->histories;
        }
    }

    public function mount()
    {
        $this->histories = Auth()->user()->histories;
        $this->is_accept = Auth()->user()->isAccept();
        $history = backHistory::query()->where('user_id' , auth()->id())->where('status' , 0 )->first();
        if ( $history  == null  )
            $history = new backHistory();

        $this->history = $history;
        $this->default_history = $history->history;

    }

    public function updateDefault($history)
    {
        $this->default_history = $history;
    }


    public function render()
    {
        return view('livewire.panel.history');
    }
}
