<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Blogs;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class FormController extends Controller
{
    public function submitForm(Request $request, int $id)
    {
        $title = $request->input('title');
        $description = $request->input('description');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageExtension = $image->hashName();
            $newImage = $image->store('img', 'public');

            File::move($image, $newImage);
        } else {
            $imageExtension = $request->input('old_image');
        }

        Blogs::where('id', $id)->update(['title' => $title, 'description' => $description, 'image' => $imageExtension]);

        return redirect()->to('/blogs/home');
    }

    public function sortByRate(Request $request)
    {
        $sort = $request->input('sortBy');

        $blogs = Blogs::orderBy($sort)->get();

        return response()->json($blogs);
    }

    public function signUp(Request $request)
    {
        // $userName = $request->input('name');
        // $email = $request->input('email');
        // $pass = $request->input('pass');

        $validated = $request->validate([
            'username' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        Users::create($validated);

        // Users::insert(['username' => $userName,'email' => $email, 'password' => $pass]);

        return redirect()->to('/blogs/home');


    }
}
