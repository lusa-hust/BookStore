<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use App\Book;
use App\Category;

class BookManagement extends Controller
{
	protected $books_per_page = 20;

    public function index() {
    	$books = Book::paginate($this->books_per_page);
    	$categories = Category::all();
    	return view('dashboard_book.book')->with('books', $books)
    										->with('categories', $categories);
    }

    public function search() {
    	$keyword = Input::get('keyword', '');
    	$keyword = '%'.$keyword.'%';

    	$books = DB::table('books')->where('title', 'like', $keyword)
    								->orWhere('author', 'like', $keyword)
    								->paginate(15);
    	$categories = Category::all();
    	return view('dashboard_book.book')->with('books', $books)
    										->with('categories', $categories);
    }

    public function delete($id) {
    	$book = Book::find($id);
    	$data_return = Array('state' => 0);

    	if (!empty($book)) {
    		$data_return['state'] = 1;
    		$book->delete();
    	}

    	echo json_encode($data_return);
    }

    public function add(Request $request) {
    	$data = Input::all();
    	$image = Input::file('image');
    	$name = Storage::disk('local')->putFile('public/covers', $request->file('image'));
    	$name = substr($name, 14);

    	$book = Book::create([
    		'title' => $data['title'],
    		'author' => $data['author'],
    		'price' => $data['price'],
    		'qty' => $data['qty'],
    		'description' => $data['intro'],
    		'image' => $name,
    	]);

    	if (is_array($data['categories']) && !empty($book) && !empty($data['categories'])) {
    		foreach ($data['categories'] as $category) {
    			$category = intval($category);
    			if ($category)
    				$book->categories()->attach($category);
    		}
    	}

        return redirect()->back();
    }

}
