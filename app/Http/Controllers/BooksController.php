<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException as ModelNotFoundException;
use Exception;

class BooksController extends Controller
{
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
            'title' => 'required|',
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
    public function edit(Book $book)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Book $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $this->validate($request, [
            'title' => 'required|',
            'author' => 'required',
            'price' => 'required|numeric|min:0',
            'qty' => 'required|integer|min:1',
            'description' => 'nullable'
        ]);

        $book->update([
            'price' => request('price'),
            'qty' => request('qty'),
            'description' => request('description'),
        ]);
        $book->save();

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
