<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Blogs;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request, int $id)
    {
        $search = $request->input('search');

        $results = Blogs::find($id)->where('title', 'like', '%' . $search . '%')->get();

        return view('blogs.blog-search', ['results' => $results]);
    }
}
