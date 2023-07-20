<?php

namespace App\Http\Controllers;

use App\Models\Blogs;
use App\Models\Users;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $blogs = Blogs::all();

        return view('home.index', ['blogs' => $blogs]);
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
