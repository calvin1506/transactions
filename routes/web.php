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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/web/get', 'WebController@getweb')->name('get_web');
Route::post('/web/getedit', 'WebController@getwebedit')->name('get_web_edit');
Route::post('/web/editprocess', 'WebController@webeditprocess')->name('web_edit_process');
Route::post('/web/add', 'WebController@addweb')->name('add_web');
Route::post('/web/delete', 'WebController@deleteweb')->name('delete_web');

Route::post('/leader/get', 'UserController@getleader')->name('get_leader');
Route::post('/leader/add', 'UserController@addleader')->name('add_leader');
Route::post('/leader/getedit', 'UserController@getleaderedit')->name('get_leader_edit');
Route::post('/leader/editprocess', 'UserController@leadereditprocess')->name('leader_edit_process');
Route::post('/leader/delete', 'UserController@deleteleader')->name('delete_leader');