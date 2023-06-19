<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Blogs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FormController extends Controller
{
    public function submitForm(Request $request, int $id)
    {
        $title = $request->input('title');
        $description = $request->input('description');
        $image = $request->input('image');

        $request->validate(['image' => 'required']);

        Blogs::where('id', $id)->update(['title' => $title, 'description' => $description, 'image' => $image]);

        return redirect()->to('/blogs');
    }

    public function sortBy(Request $request)
    {
        $select = $request->query('sort-by', 'top-rated');

        $blogs = Blogs::orderBy($select)->get();

        return view('blogs.blog-search', compact('blogs'));
    }
}
