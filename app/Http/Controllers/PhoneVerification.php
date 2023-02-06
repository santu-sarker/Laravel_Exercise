<?php

namespace App\Http\Controllers;

use App\Models\Phone_Verification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PhoneVerification extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);

    }
    public function index()
    {
        return view('pages.phone_verification');
    }

    public function send_sms($id, $number)
    {
        $to = "880" . $number;
        $token = "TOK533eba7385be16dd08b8fea6392f4c88NNN20220611";
        $url = "http://api.greenweb.com.bd/api.php?json";
        $code = rand(1000, 9999);

        $msg = "Welcome To Contact Store.Your Account Verification Code is: " . $code . ". Website Link : " . route('phone_verification');

        //first checking if alread a verification code exists in database
        $previous_code = Phone_Verification::select('*')
            ->where('user_id', $id);
        $previous_code->delete(); //deleting all previous data
        // creating new column
        $result = Phone_Verification::create([
            'user_id' => $id,
            'verification_code' => $code,
        ]);

        $data = array(
            'to' => "$to",
            'message' => "$msg",
            'token' => "$token",
        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_ENCODING, '');
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $smsresult = curl_exec($ch);

        //Result
        $arr = json_decode($smsresult, true);
        $status = $arr[0]["status"];
        // return curl_error($ch);

        //Error Display
        // echo curl_error($ch);
        return $status;
    }

    public function confirm_verification(Request $req)
    {

        if (!auth()->check()) {
            return redirect()->route('register')->with(['type' => 'warning', 'msg' => 'First You Have to Register']);
        } else {
            // $code = $req->verify_code;
            $user_id = auth()->user()->id;
            $verify = Phone_Verification::select('*')->where('user_id', $user_id)
                ->latest('created_at')
                ->first();
            if ($verify == null) {
                return redirect()->route('phone_verification')
                    ->with([['type' => 'warning', 'msg' => 'Verification process failed. Try Again']]);
            } else {
                if ($verify->verification_code == $req->verify_code) {
                    $verify->verified_at = now();
                    $verify->save();
                    $user = User::where('id', $user_id)->first();
                    $user->phone_verified = 1;
                    $user->save();
                    return redirect('/home')->with(['type' => 'success', 'msg' => "Verification Successful. "]);
                } else {
                    return redirect()->route('phone_verification')
                        ->with(['type' => 'warning', 'msg' => "Invalid Verification Code."]);
                }
            }
        }

    }
    public function resend_email()
    {
        $auth_id = auth()->user()->id;
        $user = User::select('*')->where('id', $auth_id)->first();
        if ($user != null) {
            $phone = "880" . $user->phone; //have to add country code as phone number are stored without it
            $response = $this->send_sms($auth_id, $phone);
            if ($response == "FAILED") {
                return redirect()->route('phone_verification')
                    ->with(['type' => 'danger', 'msg' => "Invalid phone number."]);
            } else {
                return redirect()->route('phone_verification')
                    ->with([['type' => 'primary', 'msg' => 'Check Your Phone. We have sent new Code.', 'from' => 'confirm_route']]);
            }
        } else {
            return redirect()->route('login')
                ->with(['type' => 'warning', 'msg' => 'First You Have to Login']);
        }
    }
}
