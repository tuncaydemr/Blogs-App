<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogsController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;


Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'home')->name('index');
    Route::get('/home', 'home')->name('home');
    Route::get('/contact', 'contact')->name('contact');
    Route::get('/my-account/{id}', 'myAccount')->name('my.account');
});

Route::controller(BlogsController::class)->group(function () {
    Route::get('/blogs/home', 'blogs')->name('blogs');
    Route::get('/blogs/add', 'add')->name('blogs.add');
    Route::post('/blogs/create', 'create')->name('blogs.create');
    Route::get('/blogs/{id}', 'show')->name('blogs.details');
    Route::get('/blogs/{id}/edit', 'edit')->name('blogs.edit');
    Route::get('/blogs/{id}/delete', 'delete')->name('blogs.delete');
    Route::get('/blogs/{id}/like', 'like')->name('blogs.like');
});

Route::controller(FormController::class)->group(function () {
    Route::put('/blogs/{id}', 'submitForm')->name('blogs.edit.submitForm');
    Route::get('/blogs/sort', 'sortByRate')->name('sortByRate');
    Route::post('/login', 'login')->name('login');
    Route::post('/register', 'register')->name('register');
    Route::post('/logout', 'logout')->name('logout');
    Route::post('/send-email', 'sendEmail')->name('send.email');
    Route::post('/my-account/{id}/edit', 'myAccountEdit')->name('my.account.edit');
    Route::get('/my-account/{id}/delete', 'myAccountDelete')->name('my.account.delete');
});

Route::controller(AdminController::class)->group(function () {
    Route::post('/admin-login', 'login')->name('admin.login');
    Route::get('/my-admin-account/{id}', 'myAdminAccount')->name('my.admin.account');
    Route::post('/my-admin-account/{id}/edit', 'myAdminAccountEdit')->name('my.admin.account.edit');
    Route::post('/admin-logout', 'logout')->name('admin.logout');
});

Route::get('/blogs', [SearchController::class, 'search'])->name('search');

