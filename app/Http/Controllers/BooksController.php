<?php

namespace App\Http\Controllers;

use App\Book;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException as ModelNotFoundException;
use Exception;

class BooksController extends Controller
{

    /**
     * BooksController constructor.
     */
    public function __construct()
    {
        //$this->middleware('auth.checkAdmin')->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'author' => 'required',
            'price' => 'required|numeric|min:0',
            'qty' => 'required|integer|min:1',
            'description' => 'nullable'
        ]);
        $book = Book::create([
            'title' => request('title'),
            'author' => request('author'),
            'price' => request('price'),
            'qty' => request('qty'),
            'description' => request('description'),
        ]);

        $book->save();

        if (request()->wantsJson()) {
            return response()->json([
                'status' => true,
                'book' => $book
            ], 201);
        }


        return redirect()->back()->with('flash', 'Book has been Created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Book $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        $reviews = $book->reviews;

        if (request()->wantsJson()) {
            return response()->json([
                'status' => true,
                'book' => $book,
                'reviews' => $reviews
            ]);
        }

        return view('books.show', compact('book', 'reviews'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Book $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Book $book)
    {
        $categories = Category::all();
        $book_categories = $book->categories;
        $check = Array();

        foreach($categories as $c) {
            $tmp = ' ';
            foreach ($book_categories as $bc) {
                if ($c->id == $bc->id) {
                    $tmp = 'checked';
                    break;
                }
            }

            $check[] = $tmp;
        }
        $html = '';
        if (request()->wantsJson()) {
            $html .= view('books/edit_modal', compact('categories', 'book', 'check'));
            return response()->json(['status'=> true, 'html'=>$html]);
        }

        return response()->json([
            'status' => false
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Book $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'id' => 'required',
            'title' => 'required|',
            'author' => 'required',
            'price' => 'required|numeric|min:0',
            'qty' => 'required|integer|min:1',
            'description' => 'nullable',
            'categories' => 'required'
        ]);

        $book = Book::find(request('id'));
        $input = $request->all();
        
        if (!empty($intput['image'])) {
            $image = Input::file('image');
            $name = Storage::disk('local')->putFile('public/covers', $request->file('image'));
            $name = substr($name, 14);
            $book->update([
                'title' => request('title'),
                'author' => request('author'),
                'price' => request('price'),
                'qty' => request('qty'),
                'description' => request('description'),
                'image' => $name
            ]);
        } else {
            $book->update([
                'title' => request('title'),
                'author' => request('author'),
                'price' => request('price'),
                'qty' => request('qty'),
                'description' => request('description')
            ]);
        }

        
        $book->save();

        $categories = $book->categories;

        $old_id = Array();
        foreach ($categories as $category) {
            $old_id[] = $category->id;
            if (!in_array($category->id, $input['categories'])) {
                $book->categories()->detach($category->id);
            }
        }

        foreach($input['categories'] as $id) {
            if (!in_array($id, $old_id)) {
                $book->categories()->attach($id);
            }
        }

        if (request()->wantsJson()) {
            return response()->json([
                'status' => true,
                'book' => $book
            ]);
        }

        return redirect()->back()->with('flash', 'Book has been Updated !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();

        if (request()->wantsJson()) {
            return response([], 204);
        }

        return redirect()->back()->with('flash', 'Book has been Deleted!');

    }
}
