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
Route::get('/register/info', 'UserRegisterController@view_user_information');
Route::get('/register/profile', 'UserRegisterController@view_user_profile');
Route::post('/register/profile/proceed', 'UserRegisterController@create_user_information');
Route::post('/register/profile/create', 'UserRegisterController@create_user');


Route::middleware(['auth','role:admin'])->group(function () {
    
});


Route::middleware(['auth','role:guest'])->group(function () {

});


Route::middleware(['auth','role:user'])->group(function () {
    
});

