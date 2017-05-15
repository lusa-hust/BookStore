<?php

namespace App\Http\Controllers;

use App\Book;
use App\Review;
use Illuminate\Http\Request;

class ReviewsController extends Controller
{

    /**
     * Create a new ReviewsController instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Book $book
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Book $book)
    {
        $this->validate($request, [
            'review' => 'required',
            'vote' => 'required|numeric|min:0|max:10'
        ]);
        $review = [
            'review' => request('review'),
            'vote' => request('vote'),
            'user_id' => auth()->id()
        ];

        $book->addReview($review);

        if (request()->wantsJson()) {
            return response()->json([
                'status' => true,
            ], 201);
        }

        return redirect()->back()->with('flash', 'Review has been Posted!');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Review $review
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Review $review)
    {
        $this->authorize('update', $review);

        $this->validate($request, [
            'review' => 'required',
            'vote' => 'required|numeric|min:0|max:10'
        ]);

        $review->update([
            'review' => request('review'),
            'vote' => request('vote')
        ]);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Review $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review)
    {
        $this->authorize('delete', $review);
        $review->delete();

        if (request()->expectsJson()) {
            return response(['status' => true]);
        }

        return back();
    }
}
