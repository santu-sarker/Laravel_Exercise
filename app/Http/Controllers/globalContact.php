<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Global_Contact;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class globalContact extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $contacts = Global_Contact::all();
        return view('pages.global_home')->with('contacts', $contacts);
    }
    public function create_contact_view()
    {
        // dd("create view");
        return view('pages.global_contact_create');
    }
    public function create_contact_store(Request $request)
    {
        $validate_data = Validator::make($request->all(), Global_Contact::$create_rules, Global_Contact::$create_msg);

        if ($validate_data->fails()) {
            return redirect()->back()
                ->withErrors($validate_data, 'global_contact')
                ->withInput();
        } else {
            $result = Global_Contact::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'gender' => $request->gender,
                'company' => $request->company,
                'user_id' => Auth::id(),
                'creator_type' => Auth::user()->role,
            ]);
            // return (Auth::user()->role);
            return redirect('global_contact')->with(['type' => 'info', 'global_msg' => 'Global Contact Created Successfully']);
        }

    }
    public function global_contact_details($id, Request $request)
    {
        if ($request->ajax()) {
            $contact_details = Global_Contact::find($id);
            return response()->json($contact_details);
        }
        // $details = DB::table('global_contacts')->select([
        //     'id',
        //     'name',
        //     'email',
        //     'phone',
        //     'company',
        //     'gender',
        //     'address',
        //     'user_id',
        // ])
        //     ->where('id', '=', $id)
        //     ->addSelect([

        //         DB::raw("(SELECT name from users where global_contacts.user_id = users.id) as created_by"),
        //     ])
        //     ->first();
        $details = Global_Contact::select([
            'id',
            'name',
            'email',
            'phone',
            'company',
            'gender',
            'address',
            'user_id',
        ])
            ->where('id', '=', $id)
            ->addSelect([
                // 'created_by' => DB::table('users')->select('name')->whereColumn('global_contacts.user_id', '=', 'users.id')->limit(1),
                'created_by' => User::query()
                    ->whereColumn('global_contacts.user_id', '=', 'users.id')
                    ->select('name')->limit(1),
                // DB::raw("(SELECT name from users where global_contacts.user_id = users.id) as created_by"),
            ])
            ->first();
        // dd($details);
        if ($details) {
            $contact = Global_Contact::find($id);
            return view('pages.global_contact_details')
                ->with('details', $details)
                ->with('contact', $contact);

        } else {
            abort(404); // contact not found
        }

    }
    public function my_contacts()
    {
        $id = Auth()->id();
        // dd($id);
        $contacts = Global_Contact::select('*')->where('user_id', $id)->get();
        // dd($contacts);
        return view('pages.global_my_contacts')->with('contacts', $contacts);
    }

    public function add_to_my_contacts($id)
    {
        $contact = Global_Contact::find($id);
        $this->authorize('eligible_to_add', $contact);
        $result = $contact->toArray();
        $result['user_id'] = auth()->user()->id; // changing contact user
        $result = Contact::create($result);
        if ($result) {
            return redirect('global_contact')->with(['type' => 'info', 'global_msg' => ' Contact Added Successfully']);
        } else {
            return redirect()->back()->with(['type' => 'warning', 'global_msg' => ' Failed to add contact']);
        }

    }
    public function edit_contact(Request $req)
    {
        if ($req->ajax()) {
            $validate_data = Validator::make($req->all(), Global_Contact::$create_rules, Global_Contact::$create_msg);

            if ($validate_data->fails()) {

                return response()->json(['type' => 'warning', 'msg' => $validate_data->errors()]);
            } else {
                Global_Contact::find($req->contact_id)->update([
                    'name' => $req->name,
                    'email' => $req->email,
                    'phone' => $req->phone,
                    'address' => $req->address,
                    'gender' => $req->gender,
                    'company' => $req->company,
                ]);
                return response()->json(['type' => 'success', 'msg' => 'Contact updated Successfully']);
            }
        }
    }
    public function delete_contact($id)
    {
        $contact = Global_Contact::find($id);
        $this->authorize('eligible_to_manipulate', $contact);
        $op_result = $contact->delete();
        if ($op_result) {
            return redirect('global_contact')->with(['type' => 'warning', 'global_msg' => 'contact deleted']);
        } else {
            return redirect('global_contact')->with(['type' => 'warning', 'global_msg' => 'Failed to delete contact']);
        }
    }

}
