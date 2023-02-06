<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phone_Verification extends Model
{
    use HasFactory;
    protected $table = "phone_verifications";
    protected $fillable = ['user_id', 'verification_code', 'verified_at'];

    // public static $create_rules = [

    //     "user_id" => ' required',
    //     "verification_code" => 'required',

    // ];
}
