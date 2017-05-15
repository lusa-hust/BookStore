<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use App\Book;
use App\Category;

class SearchController extends Controller
{
    public function index() {
        return view('search.search');
    }


    public function search() {
        
    	$keyword = Input::get('keyword', '');
        $categories = Input::get('category');
        
        $keyWhole = '%'.$keyword.'%';
        if ($categories == 0) {
            $books = DB::table('books')->where('title', 'like', $keyWhole)
    								->orWhere('author', 'like', $keyWhole)
    								->paginate(16);
            $categories = Category::all();
        } else{
            $books = Category::find($categories)->books()->where('title', 'like', $keyWhole)
    								->orWhere('author', 'like', $keyWhole)
    								->paginate(16);
            $categories = Category::all();
        }
    	                                  
    	return view('search.search')->with('books', $books)
                                    ->with('keyword', $keyword)
    							    ->with('categories', $categories);
    }

    public function filterByCategories(Request $request)
    {
        $categories = $request->input('checkbox');
        if ($categories < 0 && $categories > 5) {
            $books = Book::where('title', 'like', $keyWhole)
    								->orWhere('author', 'like', $keyWhole)
    								->paginate(16);
            $categories = Category::all();
        } else{
            $books = Book::find($categories)->books()->where('title', 'like', $keyWhole)
    								->orWhere('author', 'like', $keyWhole)
    								->paginate(16);
            $categories = Category::all();
        }
    }
}
