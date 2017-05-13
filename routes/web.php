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


Route::get('/book/{book}', ['as' => 'book.show', 'uses' => 'BooksController@show']);