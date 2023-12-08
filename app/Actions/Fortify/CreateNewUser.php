<?php

namespace App\Actions\Fortify;

use App\Http\Controllers\PhoneVerification;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'phone' => ['required', 'numeric', 'digits_between:10,10', Rule::unique(User::class, 'phone')],
            'password' => $this->passwordRules(),
        ], [
            'phone.digits_between' => 'Phone number must be 10 digit',
        ])->validate();

        $phn_verification = new PhoneVerification();
        DB::beginTransaction(); // in  case sms sent fail then we will rollback
        $id = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'phone' => $input['phone'],
            'password' => Hash::make($input['password']),
        ]);

        //FAILED
        $response = $phn_verification->send_sms($id['id'], (int) $input["phone"]);
        // if sms sent failed then rollback
        // $response = "SUCCESS";
        if ($response == "FAILED") {
            DB::rollBack();
        } else {
            DB::commit(); // commit database transaction
        }
        // Session::flash('type', 'warning');
        // Session::flash('msg', "Check Your Phone for verification code.");
        Session::put(['type' => 'success', 'msg' => "Check Your Phone for verification code."]);
        // return redirect()->route('phone_verification')
        //     ->with(['type' => 'success', 'msg' => "Check Your Phone for verification code."]);
        // $req->
        return $id;
    }
}
