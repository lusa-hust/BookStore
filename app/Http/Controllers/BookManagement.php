<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;

class BookManagement extends Controller
{
	protected $books_per_page = 20;

    public function index() {
    	$books = Book::paginate($this->books_per_page);
    	return view('dashboard_book.book')->with('books', $books);
    }
}
