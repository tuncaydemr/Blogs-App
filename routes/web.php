<?php

use App\Http\Controllers\BlogsController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\HomeController;
use App\Models\Blogs;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index']);
Route::get('/index', [HomeController::class, 'index']);
Route::get('/contact', [HomeController::class, 'contact']);
Route::get('/blogs', [BlogsController::class, 'blogs']);
Route::get('/blogs/{id}', [BlogsController::class, 'show']);
Route::get('/blogs/{id}/edit', [FormController::class, 'editForm']);
Route::put('/blogs/{id}', [FormController::class, 'submitForm']);
