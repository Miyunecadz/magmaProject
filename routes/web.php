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

Route::get('/', 'HomeController@pageDefault');

Route::get('storage/{filename}', function ($filename) {
    return Storage::get('profile_img/' . $filename);
});

Auth::routes(['register' => false]);

//Route::get('/dues/getdata','DuesController@getdata')->name('dues.getdata');

Route::middleware(['auth','role:admin'])->group(function () {

    Route::resource('announcements', 'AnnouncementsController');

    /*
        Route::get('/announcements', 'AnnouncementsController@index');
        Route::post('/announcements','AnnouncementsController@store');
        Route::get('/announcements/create','AnnouncementsController@create');
        Route::get('/announcements/{announcement}','AnnouncementsController@show');
        Route::delete('/announcements/{announcement}', 'AnnouncementsController@destroy');
        Route::put('/announcements/{announcement}', 'AnnouncementsController@update');
        Route::get('/announcements/{announcement}/edit','AnnouncementsController@edit');
    */

    Route::resource('comments','CommentsController');

    Route::get('/dues','DuesController@index')->name('dues.index');
    Route::get('/dues/pay', 'DuesController@pay_due');
    Route::post('dues/pay','DuesController@save_data');
});


Route::middleware(['auth','role:guest'])->group(function () {
    Route::get('/register/info', 'UserRegisterController@view_user_information');
    Route::get('/register/profile', 'UserRegisterController@view_user_profile');
    Route::post('/register/profile/proceed', 'UserRegisterController@create_user_information');
    Route::post('/register/profile/create', 'UserRegisterController@create_user');
});


Route::middleware(['auth','role:user,admin'])->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');
<<<<<<< HEAD
<<<<<<< HEAD
    Route::get('/member/dues','DuesController@index');
    Route::get('/member/announcements', 'AnnouncementsController@index');
    Route::get('/announcements/{announcement}','AnnouncementsController@show');
    Route::resource('comments','CommentsController');
=======
    Route::get('/userinfo', 'HomeController@userinfo');
>>>>>>> 25e58be59451ec4396e96395727f88b32b170636
=======
>>>>>>> c4f84e580c960728cf5b98778d4969d5877a9ff4
});

