<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function add_contact(Request $request)
    {
        // dd(Auth::id());
        $validated_data = Validator::make($request->all(), [

            "name" => ' required|string|min:4|max:50 ',
            "email" => "required|email",
            'phone' => 'required|string',
            "address" => "required|string",
            "gender" => "required|in:male,female",
            "company" => "required|string",
        ], [
            'name.required' => "you must fill the name field", // custom messages
            'name.min' => "name can't be less then 4 digit",
            'name.max' => "name can't be greater then 20 digit",
            'email.email' => "invalid email address",
            "address.required" => "You must fill address field",
            'gender' => 'invalid gender type',
        ])->validate();
        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'gender' => $request->gender,
            'company' => $request->company,
            'user_id' => Auth::id(),
        ]);
        return redirect('home')->with(['type' => "success", 'msg' => 'user inserted successfully']);
        // if ($validated_data->fails()) {
        //     dd($validated_data);
        // } else {
        //     Contact::create($validated_data);
        //     return redirect('home')->with(['type' => "success", 'msg' => 'user inserted successfully']);
        // }
    }
    public function delete_contact(Request $request)
    {
        $deleteable_contact = Contact::where('id', '=', $request->delete_id)->first();

        if ($deleteable_contact) {
            $deleteable_contact->delete();
            return redirect('home')->with(['type' => 'success', 'msg' => 'User Deleted Successfully']);
        } else {
            return redirect('home')->with(['type' => 'danger', 'msg' => "failed to delete Contact"]);
        }

    }
}
