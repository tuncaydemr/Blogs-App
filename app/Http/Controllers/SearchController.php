<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Blogs;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $search = $request->input('search');

        $blogs = Blogs::query()
        ->where('title', 'LIKE', "%{$search}%")
        ->get();

        return view('blogs.index', ['blogs' => $blogs]);
    }
}
