<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Book;

class HomeController extends Controller
{
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

        if ($category_id) {
            // filter by category id
            $books = Category::find($category_id)->books()->take(12)->get();
        } else {
            // no filter
            $books = Book::all()->take(12);
        }

        return view('home/home')->with('categories', $categories)
                                ->with("books", $books)
                                ->with('category_id', $category_id);
    }
}
