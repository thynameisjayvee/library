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

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/librarian/addbooks', 'BookController@index')->name('addBooks')->middleware('role:2');
Route::get('/librarian/addbooks/{id}', 'BookController@showBook')->name('showbook')->middleware('role:2');
Route::get('/librarian/find', 'BookController@searchBook');
Route::patch('/librarian/addbooks/update/{id}', 'BookController@update')->name('updateBookQty')->middleware('role:2');
Route::post('/librarian/addbooks/add', 'BookController@store')->name('addBookss')->middleware('role:2');
