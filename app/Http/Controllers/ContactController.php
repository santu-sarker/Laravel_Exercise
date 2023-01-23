<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function add_contact(Request $request)
    {

        // dd(Auth::id());
        $validated_data = Validator::make($request->all(), Contact::$create_contact_rules, Contact::$create_contact_msg);
        if ($validated_data->fails()) {
            // dd($validated_data->errors()->all());

            // $request->session()->push('errors', $validated_data->errors()->all());

            // return redirect('home');
            // dd($validated_data->errors());
            // implode("@", $validated_data->errors()->all())
            // dd($validated_data->errors());
            return response()->json(['type' => 'warning', 'msg' => $validated_data->errors()]);
            // return redirect('home')->with(['type' => "info", 'msg' => "failed to create contact"]);
        } else {
            $result = Contact::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'gender' => $request->gender,
                'company' => $request->company,
                'user_id' => Auth::id(),
            ]);
            return response()->json(['type' => 'success', 'msg' => 'Contact Created Successfully']);
        }

    }

    public function delete_contact(Request $request)
    {
        $deleteable_contact = Contact::where('id', '=', $request->delete_id)->first();

        if ($deleteable_contact) {
            $deleteable_contact->delete();
            return redirect('home')->with(['type' => 'info', 'msg' => 'User Deleted Successfully']);
        } else {
            return redirect('home')->with(['type' => 'warning', 'msg' => "failed to delete Contact"]);
        }

    }

    public function edit_contact(Request $request)
    {
        // dd(Auth::id());
        $contact_id = $request->id;
        if (Contact::find($contact_id)) {
            $validated_data = Validator::make($request->all(), Contact::$edit_contact_rules, Contact::$edit_contact_msg);
            if ($validated_data->fails()) {

                return response()->json(['type' => 'warning', 'msg' => $validated_data->errors()]);
                // return redirect('home')->with(['type' => "info", 'msg' => "failed to create contact"]);
            } else {
                $result = Contact::find($request->id)->update([
                    'name' => $request->edit_name,
                    'email' => $request->edit_email,
                    'phone' => $request->edit_phone,
                    'address' => $request->edit_address,
                    'gender' => $request->edit_gender,
                    'company' => $request->edit_company,
                ]);
                return response()->json(['type' => 'success', 'msg' => 'Contact updated Successfully']);
            }
        } else {

        }

    }
    // filtering all unique company names
    public function company_names()
    {
        $unique_company_names = Contact::select('company')->distinct()->get();
        $company = Arr::pluck($unique_company_names, 'company');
        // foreach ($unique_company_names as $name) {
        //     $company . push($name);
        // }
        return response()->json($company);
    }

}
