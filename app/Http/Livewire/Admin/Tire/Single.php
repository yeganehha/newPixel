<?php

namespace App\Http\Livewire\Admin\Tire;

use App\Models\Tire;
use Livewire\Component;

class Single extends Component
{

    public $tire;

    public function mount(Tire $Tire){
        $this->tire = $Tire;
    }

    public function delete()
    {
        $this->tire->delete();
        $this->dispatchBrowserEvent('show-message', ['type' => 'error', 'message' => __('DeletedMessage', ['name' => __('Tire') ]) ]);
        $this->emit('tireDeleted');
    }

    public function render()
    {
        return view('livewire.admin.tire.single')
            ->layout('admin::layouts.app');
    }
}
