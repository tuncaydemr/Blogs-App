<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Blogs;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function editForm($id)
    {
        $blog = Blogs::findOrFail($id);

        return view('blogs.form', compact('blog'));
    }

    public function submitForm(Request $request, int $id)
    {
        $name = $request->input('name');
        $email = $request->input('email');

        Blogs::where('id', $id)->update(['title' => $name, 'description' => $email]);

        return redirect()->to('/blogs');
    }
}
