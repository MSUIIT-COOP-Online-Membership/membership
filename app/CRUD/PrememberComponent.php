<?php

namespace App\CRUD;

use EasyPanel\Contracts\CRUDComponent;
use EasyPanel\Parsers\Fields\Field;
use App\Models\Premember;

class PrememberComponent implements CRUDComponent
{
    // Manage actions in crud
    public $create = true;
    public $delete = true;
    public $update = true;

    // If you will set it true it will automatically
    // add `user_id` to create and update action
    public $with_user_id = true;

    public function getModel()
    {
        return Premember::class;
    }

    // which kind of data should be showed in list page
    public function fields()
    {
        return [
            'fname' => Field::title('First Name'),
            'mname' => Field::title('Middle Name'),
            'lname' => Field::title('Last Name'),
            'gender' => Field::title('Gender'),
            'date_of_birth' => Field::title('Date of Birth'),
            'civil_status' => Field::title('Civil Status'),
            'email' => Field::title('Email Address'),
            'telephone_number' => Field::title('Telephone Number'),
            'mobile_number' => Field::title('Mobile Number'),
            'facebook_account' => Field::title('Facebook Account Name'),
            'present_address' => Field::title('Present Address'),
            'ofw_family_member' => Field::title('OFW Family Member'),
            'occupation' => Field::title('Occupation'),
        ];
    }

    // Searchable fields, if you dont want search feature, remove it
    public function searchable()
    {
        return ['fname', 'mname', 'lname', 'gender', 'date_of_birth', 'civil_status', 'email', 'telephone_number', 'mobile_number', 'facebook_account', 'present_address', 'ofw_family_member', 'occupation'];
    }

    // Write every fields in your db which you want to have a input
    // Available types : "ckeditor", "checkbox", "text", "select", "file", "textarea"
    // "password", "number", "email", "select", "date", "datetime", "time"
    public function inputs()
    {
        return [
            'fname' => 'text',
            'mname' => 'text',
            'lname' => 'text',
            'email' => 'email',
            'gender' => ['select' => [
                'male' => 'Male',
                'female' => 'Female',
            ]],
            'date_of_birth' => 'date',
            'civil_status' => ['select' => [
                    'single' => 'Single',
                    'married' => 'Married',
                    'widow' => 'Widow',
                    'separated' => 'Separated',
            ]],
            'telephone_number' => 'text',
            'mobile_number' => 'text',
            'facebook_account' => 'text',
            'present_address' => 'textarea',
            'ofw_family_member' => [
                'select' => [
                    'self' => 'Self',
                    'husband' => 'Husband',
                    'wife' => 'Wife',
                    'child' => 'Child',
                    'none' => 'None',
                    'other' => 'Other',
            ]],
            'occupation' => 'text',
        ];
    }

    // Validation in update and create actions
    // It uses Laravel validation system
    public function validationRules()
    {
        return [
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
    }

    // Where files will store for inputs
    public function storePaths()
    {
        return [];
    }
}
