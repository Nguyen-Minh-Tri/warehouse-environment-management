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

/*
Route::get('/hello', function () {
    //return view('welcome');
    return '<h1>Hello World</h1>';
});

Route::get('/users/{id}/{name}', function($id, $name){
    return 'This is user '.$name.' with an id of '.$id;
});
*/

Route::get('/', 'PagesController@index');
Route::get('/publishing', 'PagesController@publishing');
Route::get('/devices', 'PagesController@report');

Route::resource('posts', 'PostsController');

Route::get('/dashboard', 'DashboardController@index');

Route::get('/building', 'DashboardController@building');
Route::get('/room', 'BuildingController@room');
Route::get('/load_device', 'PagesController@load_device');
Route::get('/about', 'PagesController@about');

Auth::routes();