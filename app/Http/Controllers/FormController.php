<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Blogs;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function editForm()
    {
        return view('blogs.form');
    }

    public function submitForm(Request $request, $id)
    {
        $id = Blogs::find($id);

        $name = $request->input('name');
        $email = $request->input('email');

        $blogs = Blogs::where('id', $id)->update(['title' => $name, 'description' => $email]);

        return view('blogs.index', ['blogs' => $blogs]);
    }
}
