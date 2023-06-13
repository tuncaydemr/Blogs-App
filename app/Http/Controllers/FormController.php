<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Blogs;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function submitForm(Request $request)
    {
        $name = $request->input('name');
        $email = $request->input('email');

        $blog = Blogs::where('id', '1')->update(['title' => $name, 'description' => $email]);

        $blog = Blogs::all();

        return view('blogs.index', ['blogs' => $blog]);
    }
}
