<?php

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

use App\Mail\UserWelcomeEmailTemplate;



Auth::routes();

Route::get('/email',function(){
    return new  UserWelcomeEmailTemplate();
});
Route::post("/follow/{user}",'FollowUserController@store');
Route::get("/follow/{user}",'FollowUserController@store');

Route::get('/p/create','PostController@create');

Route::get('/', 'PostController@index');
Route::get('/p/{post}','PostController@show');
Route::get('/profile/{user}/edit','ProfilesController@edit');

Route::post('/p','PostController@store');

Route::get('/profile/{user}','ProfilesController@index')->name('profile.show');
Route::patch('/profile/{user}','ProfilesController@update')->name('profile.update');
