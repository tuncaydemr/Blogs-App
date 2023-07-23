<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function login(Request $req)
    {
        $username = $req->adminLoginUsername;
        $password = $req->adminLoginPassword;

        $admin = Admin::where('username', $username)->first();

        $validator = $req->validate([
            'adminLoginUsername' => 'required|exists:admin,username',
            'adminLoginPassword' => 'required',
        ]);

        if($admin && ($password === $username->password) && $validator) {
            Session::put('admin', $admin);
        }

        return redirect()->to('/blogs/home');
    }
}
