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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/todos/index', 'TodoController@index')->name('todo.index');
Route::get('/todos/create', 'TodoController@create')->name('todo.create');
Route::post('/todos/store', 'TodoController@store')->name('todo.store');
Route::get('/todos/show/{id}', 'TodoController@show')->name('todo.show');
Route::get('/todos/edit/{id}', 'TodoController@edit')->name('todo.edit');
Route::put('/todos/update', 'TodoController@update')->name('todo.update');
