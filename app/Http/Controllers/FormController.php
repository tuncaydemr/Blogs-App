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
        $image = $request->file('image');
        $path = $image->store('storage/img');

        $request->validate(['image' => 'required']);

        Blogs::where('id', $id)->update(['title' => $title, 'description' => $description, 'image' => $path]);

        return redirect()->to('/blogs');
    }

    public function sortByRate(Request $request)
    {
        $likes = Blogs::select('likes')->get();
        $sort = $request->input('sortBy');

        $blogs = Blogs::where('likes', $likes)->orderBy($sort, 'desc')->get();

        return view('blogs.index', ['blogs' => $blogs]);
    }
}
