<?php

namespace App\Http\Livewire\Admin\History;

use App\Jobs\GetRoleInDiscordJob;
use App\Jobs\GiveRoleInDiscordJob;
use App\Models\History;
use Livewire\Component;

class Single extends Component
{

    public $history;
    public $reason;

    public function mount(History $History){
        $this->history = $History;
    }

    public function accept()
    {
        $this->history->status = 2;
        $this->history->accepted_by = auth()->id();
        $this->history->accepted_time = now();
        $this->history->reason = null;
        $this->history->save();
        dispatch(new GiveRoleInDiscordJob($this->history->user_id , env('WHITE_LIST_ID')));
        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => 'زندگی نامه تایید شد.' ]);
        $this->emit('historyDeleted');
    }

    public function reject()
    {
        $this->history->status = 1;
        $this->history->accepted_by = auth()->id();
        $this->history->accepted_time = now();
        $this->history->reason = $this->reason;
        $this->history->save();
        dispatch(new GetRoleInDiscordJob($this->history->user_id , env('WHITE_LIST_ID')));
        $this->dispatchBrowserEvent('show-message', ['type' => 'error', 'message' => 'زندگی نامه رد شد.' ]);
        $this->emit('historyDeleted');
    }

    public function render()
    {
        return view('livewire.admin.history.single')
            ->layout('admin::layouts.app');
    }
}
