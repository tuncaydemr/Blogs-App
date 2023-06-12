<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Form;
use Illuminate\Http\Request;

class FormController extends Controller
{

    public function index()
    {
        return view('form');
    }

    public function blog(int $id, string $title, string $description, string $image)
    {
        $blog = Form::where('id', $id)
        ->update(['title' => $title, 'description' => $description, 'image' => $image]);

        $blog = Form::all();

        return view('blogs.blog-edit', ['blogs' => $blog]);
    }
}
