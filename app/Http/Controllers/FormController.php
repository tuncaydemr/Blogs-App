<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Blogs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FormController extends Controller
{
    public function editForm($id)
    {
        $blog = Blogs::find($id);

        return view('blogs.blog-edit', $blog);
    }

    public function submitForm(Request $request, int $id)
    {
        $title = $request->input('title');
        $description = $request->input('description');
        $image = $request->input('image');

        $request->validate(['image' => 'required']);

        Blogs::where('id', $id)->update(['title' => $title, 'description' => $description, 'image' => $image]);

        return redirect()->to('/blogs');
    }

    public function create(Request $request)
    {
        $title = $request->input('title');
        $description = $request->input('description');
        $image = $request->input('image');
        $active = $request->input('active');

        $request->validate(['title' => 'required', 'description' => 'required', 'image' => 'required', 'active' => 'required']);

        Blogs::insert(['title' => $title, 'description' => $description, 'image' => $image, 'active' => $active]);

        return redirect()->to('/blogs');
    }
}
