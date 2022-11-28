<?php

namespace App\Http\Livewire\Panel\BackHistory;

use App\Models\backHistory;
use Livewire\Component;

class ListAndMake extends Component
{
    public backHistory $history ;
    public $histories ;
    public $is_accept ;
    public $default_history = null ;
    public $save = false ;

    protected $rules = [
        'history.history' => 'required|string',
    ];
    public function save()
    {
        if ( ! $this->is_accept) {
            $this->history->user_id = auth()->id();
            $this->history->accepted_time = null;
            $this->history->save();
            $this->save = true;
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
        return view('livewire.panel.back-history.list-and-make');
    }
}
