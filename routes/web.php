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
Route::get('/book/edit/{book}', ['as' => 'book.edit', 'uses' => 'BooksController@edit']);
Route::post('/book/update', ['as' => 'book.update', 'uses' => 'BooksController@update']);

Route::get('/dashboard/user', ['as' => 'dashboard.user', 'uses' => 'UserManagement@index']);
Route::get('/dashboard/user/delete/{id}', ['as' => 'dashboard.user.delete', 'uses' => 'UserManagement@delete']);
Route::get('/dashboard/user/edit/{id}', ['as' => 'dashboard.user.edit', 'uses' => 'UserManagement@edit']);
Route::post('/dashboard/user/search', ['as' => 'dashboard.user.search', 'uses' => 'UserManagement@search']);
Route::post('/dashboard/user/update', ['as' => 'dashboard.user.update', 'uses' => 'UserManagement@update']);


Route::get('/dashboard/book', ['as' => 'dashboard.book', 'uses' => 'BookManagement@index']);
Route::post('/dashboard/book/search', ['as' => 'dashboard.book.search', 'uses' => 'BookManagement@search']);
Route::get('/dashboard/book/delete/{id}',
	['as' => 'dashboard.book.delete', 'uses' => 'BookManagement@delete']);
Route::post('/dashboard/book/add', ['as' => 'dashboard.book.add', 'uses' => 'BookManagement@add']);
Route::get('/books/{book}', ['as' => 'books.show', 'uses' => 'BooksController@show']);


Route::post('/books', ['as' => 'books.store', 'uses' => 'BooksController@store']);
Route::put('/books/{book}', ['as' => 'books.update', 'uses' => 'BooksController@update']);
Route::delete('/books/{book}', ['as' => 'books.destroy', 'uses' => 'BooksController@destroy']);

Route::post('/reviews/{book}', ['as' => 'reviews.store', 'uses' => 'ReviewsController@store']);
Route::put('/reviews/{review}', ['as' => 'reviews.update', 'uses' => 'ReviewsController@update']);
Route::delete('/reviews/{review}', ['as' => 'reviews.destroy', 'uses' => 'ReviewsController@destroy']);

Route::get('/payment', ['as' => 'payment.index', 'uses' => 'PaymentController@index']);
Route::get('/payment/addToCart/{book}', ['as' => 'payment.addToCart', 'uses' => 'PaymentController@addToCart']);
Route::get('/payment/checkOut/{order}', ['as' => 'payment.checkOut', 'uses' => 'PaymentController@checkOut']);

Route::get('/orders/{order}', ['as' => 'orders.show', 'uses' => 'OrdersController@show']);
Route::delete('/orders/{order}', ['as' => 'orders.destroy', 'uses' => 'OrdersController@destroy']);

Route::put('/orderRow/{orderRow}', ['as' => 'orderRows.update', 'uses' => 'OrderRowsController@update']);
Route::delete('/orderRow/{orderRow}', ['as' => 'orderRows.destroy', 'uses' => 'OrderRowsController@destroy']);
