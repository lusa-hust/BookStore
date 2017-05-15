<?php

namespace App\Http\Controllers;

use App\Book;
use App\Subscribe;
use Illuminate\Http\Request;

class SubscribesController extends Controller
{

    /**
     * Create a new ReviewsController instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subscribes = auth()->user()->subscribes;
        return view('subscribe.index', compact('subscribes'));
    }


    public function getSubscribeAvailable()
    {


        $subscribes = auth()->user()->getSubscribesAvailable;

        if ($subscribes->isNotEmpty()) {
            return response()->json([
                'status' => true,
                'subscribes' => $subscribes
            ], 200);

        } else {

            return response()->json([
                'status' => false,
                'subscribes' => $subscribes
            ], 200);

        }


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Book $book
     * @return \Illuminate\Http\Response
     * @internal param Request $request
     */
    public function store(Book $book)
    {

        $subscribe = [
            'user_id' => auth()->id()
        ];

        $book->addSubscribe($subscribe);

        if (request()->wantsJson()) {
            return response()->json([
                'status' => true,
            ], 201);
        }

        return redirect()->back();
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param Book $book
     * @return \Illuminate\Http\Response
     * @internal param Subscribe $subscribe
     */
    public function destroy(Book $book)
    {
        $book->removeSubscribe(auth()->user());

        if (request()->expectsJson()) {
            return response(['status' => true]);
        }

        return back();
    }

}
