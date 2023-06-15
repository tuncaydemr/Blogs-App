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
    public function edit()
    {
        return view('blogs.blog-create');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(int $id)
    {
        $number = Blogs::findOrFail(4);
        $id = Blogs::findOrFail($id);

        Blogs::where('id', $id)->update(['likes' => $number->likes++]);

        return redirect()->to('/blogs/{id}');
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
