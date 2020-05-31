<?php

use App\Http\Controllers\TodolistController;
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

Route::get('/', function () {
    return view('index');
});
Route::group(["middleware" => "auth"], function () {

    Route::view("/mypage", "mypage");
    Route::view("/post", "post");
    Route::view("/changepass", "auth/changepassword");

    Route::post("/add", "TodolistController@post");
    Route::post("/edit", "TodolistController@edit");
    Route::post("/delete", "TodolistController@delete");
    Route::post("/success", "TodolistController@success");
    Route::post("/lumpdel", "TodolistController@lumpdel");
});


Route::get("/gettodos", "TodolistController@get");
Route::get("/loginuser", "TodolistController@loginuser");

Route::get('changepassword', 'HomeController@showChangePasswordForm');
Route::post('changepassword', 'HomeController@changePassword')->name('changepassword');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
