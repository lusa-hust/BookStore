<?php

namespace App\Http\Controllers;

use App\Order;
use App\Book;
use Illuminate\Http\Request;

class PaymentController extends Controller
{

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
        $orders =  auth()->user()->orders;


        if (request()->wantsJson()) {
            return response()->json([
                'status' => true,
                'orders' => $orders,
            ]);
        }

        return view('payment.index', compact('orders'));
    }

    /**
     *
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function addToCart(Book $book)
    {
        $order = Order::firstOrCreate(
            ['paid' => false], ['user_id' => auth()->user()->id]
        );

        $order_row = [
            'qty' => 1,
            'book_id' => $book->id
        ];

        $order->addRow($order_row);

        return redirect()->back()->with('flash', 'Book has been add to cash!');
    }

    /**
     *
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function checkOut(Order $order)
    {
        $order_rows = $order->order_rows;

        $flag = false;

        foreach ($order_rows as $order_row) {
            if ($order_row->book->qty >= $order_row->qty) {
                $order_row->book->qty = $order_row->book->qty - $order_row->qty;
                $order_row->book->save();
            } else {
                $flag = true;

                $order_row->update(['qty' => $order_row->book->qty]);
            }
        }

        if ($flag) {
            return redirect()->back()->with('flash', 'Checkout Not Successful !!');
        }



        $order->paid = true;
        $order->save();

        return redirect()->back()->with('flash', 'Checkout Successful !!');
    }


}
