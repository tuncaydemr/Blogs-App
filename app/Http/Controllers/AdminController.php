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
            'adminLoginUsername' => 'required',
            'adminLoginPassword' => 'required',
        ]);

        if($admin && ($password == $admin->password) && $validator) {
            Session::put('admin', $admin);

            return redirect()->to('/home');
        }

        return "başarısız";
    }

    public function logout()
    {
        Session::forget('admin');

        return redirect()->to('/home');
    }

    public function myAdminAccount($id)
    {
        $admin = Admin::find($id);

        return view('account.my-admin-account', ['admin' => $admin]);
    }

    public function myAdminAccountEdit(Request $req)
    {
        $username = $req->username;
        $password = $req->password;
    }
}
