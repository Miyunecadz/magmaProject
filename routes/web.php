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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/register', 'UserRegisterController@view_user_information');


Route::middleware(['auth','role:admin'])->group(function () {
    Route::resource('announcements','AnnouncementsController');
    Route::resource('comments','CommentsController');

});


Route::middleware(['auth','role:guest'])->group(function () {

});


Route::middleware(['auth','role:user'])->group(function () {

});
