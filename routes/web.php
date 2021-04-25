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

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('jobPosts' , 'JobPostController')->middleware('auth');

Route::post('fetch' , 'JobPostController@fetch');

Route::GET('changeVisibility/{id}' , 'JobPostController@changeVisibility');

Route::GET('changePublish/{id}' , 'JobPostController@changePublish');

Route::resource('country' , 'CountryController');

Route::resource('category' , 'CategoryController');

Route::resource('profile' , 'ProfileController');