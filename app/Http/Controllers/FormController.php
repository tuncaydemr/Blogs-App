<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Blogs;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

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
        $password = $request->password;

        $hashPassword = Hash::make($password);

        $request->validate([
            'username' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

        Users::insert([
            'username' => $request->username,
            'email' => $request->email,
            'password' => $hashPassword
        ]);

        return redirect()->to('/blogs/home');
    }

    public function signIn(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        $dbEmail = Users::where('email', $email)->get();

        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

        if($dbEmail && Hash::check($password, $dbEmail->password)) {
            Session::put('user', $dbEmail);
        }



    }
}
