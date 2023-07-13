<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Blogs;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
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

    public function register(Request $request)
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

    public function login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        $user = Users::where('email', $email)->first();

        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

        if($user && Hash::check($password, $user->password) ) {
            Session::put('user', $user);
        }

        return redirect()->to('/blogs/home');
    }

    public function logout()
    {
        Session::forget('user');

        return redirect()->route('login');
    }
}
