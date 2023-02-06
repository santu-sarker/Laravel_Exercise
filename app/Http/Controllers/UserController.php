<?php

namespace App\Http\Controllers;

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
    public function index()
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
        // if($request->ajax()){
        //     return
        // }
        return view('pages.test');
    }
}
