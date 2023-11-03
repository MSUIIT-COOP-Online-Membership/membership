<?php

namespace App\Http\Livewire\Admin\Premember;

use App\Models\Premember;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $premember;

    
    protected $rules = [
        
    ];

    public function mount(Premember $Premember){
        $this->premember = $Premember;
        
    }

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function update()
    {
        if($this->getRules())
            $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('UpdatedMessage', ['name' => __('Premember') ]) ]);
        
        $this->premember->update([
            'user_id' => auth()->id(),
        ]);
    }

    public function render()
    {
        return view('livewire.admin.premember.update', [
            'premember' => $this->premember
        ])->layout('admin::layouts.app', ['title' => __('UpdateTitle', ['name' => __('Premember') ])]);
    }
}
