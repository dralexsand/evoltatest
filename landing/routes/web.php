<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware('activity')->group(function () {
    Route::get('/', function () {
        return view('pages.home');
    })->name('home');

    Route::get('about', function () {
        return view('pages.about');
    })->name('about');

    Route::get('contacts', function () {
        return view('pages.contacts');
    })->name('contacts');

    Route::get('detail', function () {
        return view('pages.detail');
    })->name('detail');

    Route::get('info', function () {
        return view('pages.info');
    })->name('info');

    Route::get('list', function () {
        return view('pages.list');
    })->name('list');

    Route::get('admin/activity', function () {
        return view('pages.activity');
    })->name('admin.activity');
});


