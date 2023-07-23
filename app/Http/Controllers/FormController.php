<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\MyEmail;
use App\Models\Blogs;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class FormController extends Controller
{
    public function submitForm(Request $request, int $id)
    {
        $title = $request->input('title');
        $description = $request->input('description');

        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

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
        $sort = $request->sortBy;

        if($sort === 'asc') {
            Blogs::orderBy('likes')->get();
        }

        return redirect()->to('/blogs/home');
    }

    public function register(Request $request)
    {
        $username = $request->registerUsername;
        $email = $request->registerEmail;
        $password = $request->registerPassword;
        $hashPassword = Hash::make($password);

        $validator = $request->validate([
            'registerUsername' => 'required|string|unique:users,username',

            'registerEmail' => 'required|email|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix|unique:users,email',

            'registerPassword' => 'required|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[^\w\s]).{8,}$/'
        ]);

        if($validator) {
            Users::insert([
                'username' => $username,
                'email' => $email,
                'password' => $hashPassword
            ]);

            return redirect()->back()->with('success', 'Congratulations. You have successfully registered.');
        }
    }

    public function login(Request $request)
    {
        $email = $request->loginEmail;
        $password = $request->loginPassword;
        $user = Users::where('email', $email)->first();

        $validator = $request->validate([
            'loginEmail' => 'required|exists:users,email',

            'loginPassword' => 'required'
        ]);

        if($user && Hash::check($password, $user->password) && $validator) {
            Session::put('user', $user);
        }

        return redirect()->to('/blogs/home');
    }

    public function logout()
    {
        Session::forget('user');

        return redirect()->to('/home');
    }

    public function sendEmail(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
            'phone' => 'required|regex:/^\+[0-9]{1,3}[0-9]{10}$/',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
            'phone' => $request->phone,
        ];

        Mail::to('tuncaydemir682@gmail.com')->send(new MyEmail($data));

        return redirect()->back()->with('success', 'Congratulations. Your message has been sent!');
    }

    public function myAccountEdit(Request $req, $id)
    {
        $username = $req->username;
        $email = $req->email;
        $password = $req->password;

        $hashPassword = Hash::make($password);

        $req->validate([
            'username' => 'required|string',

            'email' => 'required|email|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',

            'password' => 'required|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[^\w\s]).{8,}$/'
        ]);

        Users::find($id)->update(['username' => $username, 'email' => $email, 'password' => $hashPassword]);

        return redirect()->to('/blogs/home');
    }

    public function myAccountDelete($id)
    {
        Users::find($id)->delete();

        Session::forget('user');

        return redirect()->to('/home');
    }
}
