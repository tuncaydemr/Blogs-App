<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function login(Request $req)
    {
        $username = $req->adminLoginUsername;
        $password = $req->adminLoginPassword;

        $req->validate([
            'adminLoginUsername' => 'required|exists:admin,username',
            'adminLoginPassword' => 'required',
        ]);


    }
}
