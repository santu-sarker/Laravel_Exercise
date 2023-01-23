<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'phone', 'company', 'address', 'gender', 'user_id'];

    public static $create_contact_rules = [

        "name" => ' required|string|min:4|max:50 ',
        "email" => "required|email",
        'phone' => 'required|string',
        "address" => "required|string",
        "gender" => "required|in:Male,Female,male,female",
        "company" => "required|string",
    ];
    public static $edit_contact_rules = [
        "id" => 'required',
        "edit_name" => ' required|string|min:4|max:50 ',
        "edit_email" => "required|email",
        'edit_phone' => 'required|string',
        "edit_address" => "required|string",
        "edit_gender" => "required|in:Male,Female,male,female",
        "edit_company" => "required|string",
    ];
    public static $create_contact_msg = [
        'name.required' => "you must fill the name field", // custom messages
        'name.min' => "name can't be less then 4 digit",
        'name.max' => "name can't be greater then 20 digit",
        'email.email' => "invalid email address",
        "address.required" => "You must fill address field",
        // 'gender' => 'invalid gender type',
    ];
    public static $edit_contact_msg = [
        'edit_name.required' => "you must fill the name field", // custom messages
        'edit_name.min' => "name can't be less then 4 digit",
        'edit_name.max' => "name can't be greater then 20 digit",
        'edit_email.email' => "invalid email address",
        "edit_address.required" => "You must fill address field",
        // 'gender' => 'invalid gender type',
    ];
}
