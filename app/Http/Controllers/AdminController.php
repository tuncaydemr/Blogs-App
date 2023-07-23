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
        }

        return redirect()->to('/home');
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

    public function myAdminAccountEdit(Request $req, $id)
    {
        $username = $req->username;
        $password = $req->password;

        $admin = Admin::find($id);

        $req->validate([
            'username' => 'required|string',

            'password' => 'required',
        ]);

        if(($username !== $admin->username)) {
            $admin->update([
                'username' => $username,
                'password' => $password,
            ]);

            return redirect()->route('my.admin.account', $id)->with('success', 'Congratulations, Your admin account has been updated.');
        } else {
            return redirect()->route('my.admin.account', $id)->with('error', 'Invalid username or password.');
        }
    }
}
