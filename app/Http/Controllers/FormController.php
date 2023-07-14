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
        $username = $request->registerUsername;
        $email = $request->registerEmail;
        $password = $request->registerPassword;
        $hashPassword = Hash::make($password);

        $validator = $request->validate([
            'registerUsername' => 'required|string',

            'registerEmail' => 'required|email|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',

            'registerPassword' => 'required|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[^\w\s]).{8,}$/'
        ]);

        Users::insert([
            'username' => $username,
            'email' => $email,
            'password' => $hashPassword
        ]);

        if($validator) {
            return redirect()->route('login');
        }

        return redirect()->to('/blogs/home');
    }

    public function login(Request $request)
    {
        $email = $request->loginEmail;
        $password = $request->loginPassword;
        $user = Users::where('email', $email)->first();

        $request->validate([
            'loginEmail' => 'required|exists:users,email',

            'loginPassword' => 'required|exists:users,password'
        ]);

        if($user && Hash::check($password, $user->password) ) {
            Session::put('user', $user);
        }

        return redirect()->to('/blogs/home');
    }

    public function logout()
    {
        Session::forget('user');

        return redirect()->to('/home');
    }
}
