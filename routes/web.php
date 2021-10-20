<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes(['register' => false]);

Route::middleware('auth')->name('admin.')->prefix('admin')->namespace('Admin')->group(function () {
    // tutte le rotte protette
    Route::get('/', 'HomeController@index')->name('home');
    Route::resource('posts', 'PostController');
});

Route::get('{any?}', function () {
    return view('guest.home');
})->where('any', '.*');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
