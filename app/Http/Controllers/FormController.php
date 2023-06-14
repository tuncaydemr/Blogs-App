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
        $blog = Blogs::findOrFail($id);

        return view('blogs.form', compact('blog'));
    }

    public function submitForm(Request $request, int $id)
    {
        $title = $request->input('title');
        $description = $request->input('description');
        $image = $request->input('image');

        Blogs::where('id', $id)->update(['title' => $title, 'description' => $description, 'image' => $image]);

        return redirect()->to('/blogs');
    }

    public function create(Request $request)
    {
        $title = $request->input('title');
        $description = $request->input('description');
        $image = $request->input('image');

        Blogs::insert(['title' => $title, 'description' => $description, 'image' => $image, 'active' => 1]);

        return redirect()->to('/blogs');
    }
}
