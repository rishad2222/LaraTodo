<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('todos')->as('todo.')->group(function(){
    Route::get('/index', 'TodoController@index')->name('index');
    Route::get('/create', 'TodoController@create')->name('create');
    Route::post('/store', 'TodoController@store')->name('store');
    Route::get('/show/{id}', 'TodoController@show')->name('show');
    Route::get('/edit/{id}', 'TodoController@edit')->name('edit');
    Route::put('/update', 'TodoController@update')->name('update');
    Route::delete('/destroy', 'TodoController@destroy')->name('destroy');
});
