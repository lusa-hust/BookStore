<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\Book;

class BookManagement extends Controller
{
	protected $books_per_page = 20;

    public function index() {
    	$books = Book::paginate($this->books_per_page);
    	return view('dashboard_book.book')->with('books', $books);
    }

    public function search() {
    	$keyword = Input::get('keyword', '');
    	$keyword = '%'.$keyword.'%';

    	$books = DB::table('books')->where('title', 'like', $keyword)
    								->orWhere('author', 'like', $keyword)
    								->paginate(15);
    	return view('dashboard_book.book')->with('books', $books);
    }

    public function delete($id) {
    	$book = Book::find($id);
    	$data_return = Array('state' => 0);

    	if (!empty($book)) {
    		$data_return['state'] = 1;
    		//$book->delete();
    	}

    	echo json_encode($data_return);
    }
}
