<?php

namespace App\Http\Livewire\Admin\Transaction;

use App\Models\Transaction;
use Livewire\Component;

class Single extends Component
{

    public $transaction;

    public function mount(Transaction $Transaction){
        $this->transaction = $Transaction;
    }

    public function delete()
    {
        $this->transaction->delete();
        $this->dispatchBrowserEvent('show-message', ['type' => 'error', 'message' => __('DeletedMessage', ['name' => __('Transaction') ]) ]);
        $this->emit('transactionDeleted');
    }

    public function render()
    {
        return view('livewire.admin.transaction.single')
            ->layout('admin::layouts.app');
    }
}
