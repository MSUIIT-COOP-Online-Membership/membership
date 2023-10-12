<?php

namespace App\Http\Livewire\Admin\Premember;

use App\Models\Premember;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $premember;

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

    public function mount(Premember $Premember){
        $this->premember = $Premember;
        $this->fname = $this->premember->fname;
        $this->mname = $this->premember->mname;
        $this->lname = $this->premember->lname;
        $this->email = $this->premember->email;
        $this->gender = $this->premember->gender;
        $this->date_of_birth = $this->premember->date_of_birth;
        $this->civil_status = $this->premember->civil_status;
        $this->telephone_number = $this->premember->telephone_number;
        $this->mobile_number = $this->premember->mobile_number;
        $this->facebook_account = $this->premember->facebook_account;
        $this->present_address = $this->premember->present_address;
        $this->ofw_family_member = $this->premember->ofw_family_member;
        $this->occupation = $this->premember->occupation;        
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
    }

    public function render()
    {
        return view('livewire.admin.premember.update', [
            'premember' => $this->premember
        ])->layout('admin::layouts.app', ['title' => __('UpdateTitle', ['name' => __('Premember') ])]);
    }
}
