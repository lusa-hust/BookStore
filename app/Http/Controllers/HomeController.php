<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Book;

class HomeController extends Controller
{
    protected $book_block = 12;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($category_id=0)
    {
        $category_id = intval($category_id);
        $categories = Category::all();
        $books = $this->get_books($category_id, 1);

        return view('home/home', compact('categories', 'books', 'category_id'));

    }


    /**
     * return more books to client
     */
    public function more_books($category_id, $page) {
        $books = $this->get_books($category_id, $page);
        $data_return = Array();

        $html = '';
        // compose html code
        foreach($books as $book) {
            $html .= view('home/bookcover')->with('book', $book);
        }

        $data_return['html'] = $html;

        // if there is no books to load
        // don't increase $page
        if (empty($html)) {
            $data_return['page'] = $page;
        } else {
            $data_return['page'] = $page + 1;
        }

        echo json_encode($data_return);
    }


    protected function get_books($category_id, $page) {
        $category_id = intval($category_id);
        $page = intval($page);
        if ($category_id) {
            // if category_id is set
            // filter by category
            if ($page >= 1) {
                // valid page
                $books = Category::find($category_id)->books();
                $nbooks = $books->count();
                if ($page > $nbooks/$this->book_block + 1) {
                    return Array();
                } else {
                    return $books->forPage($page, $this->book_block)->get();
                }
                                                    
            } else {
                // invalid page
                // return default page
                $books = Category::find($category_id)->books()
                                                    ->forPage(1, $this->book_block)->get();
            }
        } else {
            // no filter
            $books = Book::all();
            $nbooks = $books->count();
            if ($page > $nbooks/$this->book_block + 1) {
                return Array();
            } else {
                return $books->forPage($page, $this->book_block);
            }
        }

        return $books;

    }
}
