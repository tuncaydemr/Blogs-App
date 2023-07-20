<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home() {
        return view('home.index');
    }

    public function contact()
    {
        return view('home.contact');
    }

    public function myAccount($id)
    {
        $users = Users::find($id);

        return view('account.my-account', ['users' => $users]);
    }
}
