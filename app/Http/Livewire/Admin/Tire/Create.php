<?php

namespace App\Http\Livewire\Admin\Tire;

use App\Models\Tire;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $name;
    public $expire;
    public $price;
    public $discord_roll_id;
    
    protected $rules = [
        'name' => 'required|min:2|max:255',
        'expire' => 'required|numeric|min:1',
        'price' => 'required|numeric|min:0',        
    ];

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function create()
    {
        if($this->getRules())
            $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('CreatedMessage', ['name' => __('Tire') ])]);
        
        Tire::create([
            'name' => $this->name,
            'expire' => $this->expire,
            'price' => $this->price,
            'discord_roll_id' => $this->discord_roll_id,            
        ]);

        $this->reset();
    }

    public function render()
    {
        return view('livewire.admin.tire.create')
            ->layout('admin::layouts.app', ['title' => __('CreateTitle', ['name' => __('Tire') ])]);
    }
}
