<?php

namespace App\Http\Controllers;

use App\Models\Blogs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class BlogsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function blogs()
    {
        $blogs = Blogs::orderBy('title', 'asc')->paginate(2);

        return view('blogs.index', ['blogs' => $blogs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $title = $request->input('title');
        $description = $request->input('description');
        $active = $request->input('active');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageExtension = $image->hashName();
            $newImage = $image->store('img', 'public');

            File::move($image, $newImage);
        }

        $request->validate(['title' => 'required', 'description' => 'required', 'image' => 'required', 'active' => 'required']);

        Blogs::insert(['title' => $title, 'description' => $description, 'image' => $imageExtension, 'active' => $active]);

        return redirect()->to('/blogs/home');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function edit($id)
    {
        $blog = Blogs::findOrFail($id);

        return view('blogs.blog-edit', $blog);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $blog = Blogs::findOrFail($id);

        return view('blogs.blog-details', $blog);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function add()
    {
        return view('blogs.blog-create');
    }

    /**
     * Update the specified resource in storage.
     */
    public function like(int $id)
    {
        $number = Blogs::findOrFail($id);

        $number->increment('likes');

        $number->save();

        return redirect()->to('/blogs/home');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(int $id)
    {
        Blogs::findOrFail($id)->delete();

        return redirect()->to('/blogs/home');
    }
}
