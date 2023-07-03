<?php

namespace App\Http\Controllers;

use App\Models\Blogs;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\File;

class BlogsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function blogs()
    {
        $blogs = Blogs::all();

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

        $image = $request->file('image')->store('public/img', $request->Blogs()->id);


        $request->validate(['title' => 'required', 'description' => 'required', 'image' => 'required', 'active' => 'required']);

        Blogs::insert(['title' => $title, 'description' => $description, 'image' => $image, 'active' => $active]);

        return redirect()->to('/blogs');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function edit($id)
    {
        $blog = Blogs::find($id);

        return view('blogs.blog-edit', $blog);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $blog = Blogs::find($id);

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
        $number = Blogs::find($id);

        $number->increment('likes');

        $number->save();

        return redirect()->to('/blogs');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(int $id)
    {
        Blogs::find($id);

        Blogs::where('id', $id)->delete();

        return redirect()->to('/blogs');
    }
}
