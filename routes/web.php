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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('notebook','NotebookController');

Route::get('/home', 'HomeController@index');


Route::post('register','UserController@register');
Route::post('login','UserController@login');
// Route::get('logout','UserController@logout');

