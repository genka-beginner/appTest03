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

// Route::get('/', 'BooksController@index');
// Route::get('/books', 'BooksController@create');
// Route::post('/books','BooksController@store');
// Route::delete('/books/{book}', 'BooksController@destroy');
// Route::get('/books/{book}/edit', 'BooksController@edit');
// Route::put('/books/{book}', 'BooksController@update');
// Route::get('/books/{book}', 'BooksController@edit');
// Route::get('/books/{book}/show', 'BooksController@show');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'],function() {
    Route::get('/', 'BooksController@index');
    Route::get('/books', 'BooksController@create');
    Route::post('/books','BooksController@store');
    Route::delete('/books/{book}', 'BooksController@destroy');
    Route::get('/books/{book}/edit', 'BooksController@edit');
    Route::put('/books/{book}', 'BooksController@update');
    Route::get('/books/{book}', 'BooksController@edit');
    Route::get('/books/{book}/show', 'BooksController@show');
});
