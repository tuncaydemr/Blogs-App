<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Blogs;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function submitForm(Request $request)
    {
        // Handle form submission logic here

        // Access form data
        $name = $request->input('name');
        $email = $request->input('email');

        $blog = Blogs::where('id', '1')
            ->update(['title' => $name, 'description' => $email]);

        $blog = Blogs::all();

        // Perform validation, database operations, etc.

        // Redirect back or to a success page
        return view('blogs.index', ['blogs' => $blog]);
    }
}
