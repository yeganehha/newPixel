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
        'history.history' => 'required|string',
        'history.rules' => 'required|in:1',
        'history.admin' => 'required|in:1',
        'history.accept' => 'required|in:1',
        'history.name' => 'required|string',
        'history.ability' => 'required|string',
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
