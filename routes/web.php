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


Auth::routes();


Route::get('/home/{category_id?}', ['as' => 'home', 'uses' => 'HomeController@index']);

Route::get('/', function () {
    return Redirect::route('home');
});


Route::get('/home/more_books/{category_id}/{page}', ['as' => 'more_books', 'uses' => 'HomeController@more_books']);


Route::get('/db/up', 'Initialization@up');


Route::get('/books/{book}', ['as' => 'books.show', 'uses' => 'BooksController@show']);


Route::post('/books', ['as' => 'books.store', 'uses' => 'BooksController@store']);
Route::put('/books/{book}', ['as' => 'books.update', 'uses' => 'BooksController@update']);
Route::delete('/books/{book}', ['as' => 'books.destroy', 'uses' => 'BooksController@destroy']);
