<?php

namespace App\Http\Livewire\Admin\Premember;

use App\Models\Premember;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $fname;
    public $mname;
    public $lname;
    public $email;
    public $gender;
    public $date_of_birth;
    public $civil_status;
    public $telephone_number;
    public $mobile_number;
    public $facebook_account;
    public $present_address;
    public $ofw_family_member;
    public $occupation;
    
    protected $rules = [
        'fname' => 'required',
        'mname' => 'required',
        'lname' => 'required',
        'email' => 'required',
        'gender' => 'required',
        'date_of_birth' => 'required',
        'civil_status' => 'required',
        'telephone_number' => 'required',
        'mobile_number' => 'required',
        'facebook_account' => 'required',
        'present_address' => 'required',
        'ofw_family_member' => 'required',
        'occupation' => 'required',        
    ];

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function create()
    {
        if($this->getRules())
            $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('CreatedMessage', ['name' => __('Premember') ])]);
        
        Premember::create([
            'fname' => $this->fname,
            'mname' => $this->mname,
            'lname' => $this->lname,
            'email' => $this->email,
            'gender' => $this->gender,
            'date_of_birth' => $this->date_of_birth,
            'civil_status' => $this->civil_status,
            'telephone_number' => $this->telephone_number,
            'mobile_number' => $this->mobile_number,
            'facebook_account' => $this->facebook_account,
            'present_address' => $this->present_address,
            'ofw_family_member' => $this->ofw_family_member,
            'occupation' => $this->occupation,
            'user_id' => auth()->id(),
        ]);

        $this->reset();
    }

    public function render()
    {
        return view('livewire.admin.premember.create')
            ->layout('admin::layouts.app', ['title' => __('CreateTitle', ['name' => __('Premember') ])]);
    }
}
