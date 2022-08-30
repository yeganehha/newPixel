<?php

namespace App\Http\Livewire\Admin\Tire;

use App\Models\Tire;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $tire;

    public $name;
    public $expire;
    public $price;
    public $discord_roll_id;
    
    protected $rules = [
        'name' => 'required|min:2|max:255',
        'expire' => 'required|numeric|min:1',
        'price' => 'required|numeric|min:0',        
    ];

    public function mount(Tire $Tire){
        $this->tire = $Tire;
        $this->name = $this->tire->name;
        $this->expire = $this->tire->expire;
        $this->price = $this->tire->price;
        $this->discord_roll_id = $this->tire->discord_roll_id;        
    }

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function update()
    {
        if($this->getRules())
            $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('UpdatedMessage', ['name' => __('Tire') ]) ]);
        
        $this->tire->update([
            'name' => $this->name,
            'expire' => $this->expire,
            'price' => $this->price,
            'discord_roll_id' => $this->discord_roll_id,            
        ]);
    }

    public function render()
    {
        return view('livewire.admin.tire.update', [
            'tire' => $this->tire
        ])->layout('admin::layouts.app', ['title' => __('UpdateTitle', ['name' => __('Tire') ])]);
    }
}
