<?php

namespace App\Http\Controllers;

use App\Models\Blogs;
use Illuminate\Http\Request;

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
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $blog = Blogs::findOrFail($id);

        return view('blogs.blog-details', $blog);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $validate = $request->validate(['title' => 'required', 'description' => 'required', 'image' => 'required', 'active' => 'required']);

        return view('blogs.blog-create', $validate);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update()
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(int $id)
    {
        Blogs::findOrFail($id);

        Blogs::where('id', $id)->delete();

        return redirect()->to('/blogs');
    }
}
