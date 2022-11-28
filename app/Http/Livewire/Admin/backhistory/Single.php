<?php

namespace App\Http\Livewire\Admin\backhistory;

use App\Jobs\GetRoleInDiscordJob;
use App\Jobs\GiveRoleInDiscordJob;
use App\Models\backHistory;
use Livewire\Component;

class Single extends Component
{

    public $backhistory;
    public $reason;

    public function mount(BackHistory $BackHistory){
        $this->backhistory = $BackHistory;
    }

    public function accept()
    {
        $this->backhistory->status = 2;
        $this->backhistory->accepted_by = auth()->id();
        $this->backhistory->accepted_time = now();
        $this->backhistory->reason = null;
        $this->backhistory->save();
        dispatch(new GiveRoleInDiscordJob($this->backhistory->user_id , env('WHITE_LIST_ID')));
        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => 'زندگی نامه تایید شد.' ]);
        $this->emit('backhistoryDeleted');
    }

    public function reject()
    {
        $this->backhistory->status = 1;
        $this->backhistory->accepted_by = auth()->id();
        $this->backhistory->accepted_time = now();
        $this->backhistory->reason = $this->reason;
        $this->backhistory->save();
        dispatch(new GetRoleInDiscordJob($this->backhistory->user_id , env('WHITE_LIST_ID')));
        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => 'زندگی نامه تایید شد.' ]);
        $this->emit('backhistoryDeleted');
    }

    public function render()
    {
        return view('livewire.admin.backhistory.single')
            ->layout('admin::layouts.app');
    }
}
