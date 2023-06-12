<?php

use App\Http\Controllers\BlogsController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\HomeController;
use App\Models\Blogs;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index']);
Route::get('/index', [HomeController::class, 'index']);
Route::get('/contact', [HomeController::class, 'contact']);
Route::get('/blogs', [BlogsController::class, 'blogs']);
Route::get('/blogs/{id}', [BlogsController::class, 'show']);

Route::get('/blogs/{id}/form', function () {
    return view('form');
});

Route::post('/submit-form', 'FormController@submitForm')->name('submit-form');
