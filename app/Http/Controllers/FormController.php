<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Blogs;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function editForm(Request $request)
    {
        $id = $request->input('id');
        $blogs = Blogs::find($id);

        return view('blogs.form', compact('blogs'));
    }

    public function submitForm(Request $request)
    {
        $id = $request->input('id');

        $getId = Blogs::find($id);
        $name = $request->input('name');
        $email = $request->input('email');

        $blogs = Blogs::where('id', $getId)->update(['title' => $name, 'description' => $email]);

        return view('blogs.index', ['blogs' => $blogs]);
    }
}
