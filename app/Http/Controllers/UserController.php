<?php

namespace App\Http\Controllers;

use App\Models\Global_Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function __construct()
    {
        // $this->middleware(['auth']);
        $this->middleware(['auth', 'phone_verified']);
    }
    public function index(Request $req)
    {
        // $contacts = Contact::where('user_id', '=', Auth::id())->get();

        $contacts = DB::table('users')
            ->join('contacts', 'users.id', '=', 'contacts.user_id')
            ->where('users.id', '=', Auth::id())
            ->select('contacts.id as contact_id', 'contacts.name', 'contacts.email', 'contacts.phone', 'contacts.address', 'contacts.gender', 'contacts.company', 'contacts.created_at', 'users.is_active as active', 'contacts.user_id as user_id')
            ->orderBy('contact_id')
            ->get();

        return view('pages.user_home')->with('contacts', $contacts);

    }
    public function test(Request $request)
    {
        if ($request->ajax()) {
            $data = Global_Contact::all();
            return datatables($data)
                ->addColumn('delete', function ($row) {
                    return '<button class="btn btn-sm  btn-outline-danger" onclick="delete_server_contact(' . $row['id'] . ')">delete</button>';
                })
                ->rawColumns(['delete'])
                ->make(true);
        }
        return view('pages.test');
    }
    public function delete($id, Request $req)
    {
        if ($req->ajax()) {
            $data = Global_Contact::select("*")->where('id', $id)->first();
            if ($data) {
                $data->delete();
                return response()->json(['type' => 'success', 'msg' => 'succesfully deleted']);
            } else {
                return response()->json(['type' => 'warning', 'msg' => "Failed to delete contact"]);
            }
        }
    }
}
