<?php

namespace App\Http\Livewire\Admin\Premember;

use App\Models\Premember;
use Livewire\Component;

class Single extends Component
{

    public $premember;

    public function mount(Premember $Premember){
        $this->premember = $Premember;
    }

    public function delete()
    {
        $this->premember->delete();
        $this->dispatchBrowserEvent('show-message', ['type' => 'error', 'message' => __('DeletedMessage', ['name' => __('Premember') ]) ]);
        $this->emit('prememberDeleted');
    }

    public function render()
    {
        return view('livewire.admin.premember.single')
            ->layout('admin::layouts.app');
    }
}
