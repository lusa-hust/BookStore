<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class OrdersController extends Controller
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
        return auth()->user()->orders;
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Order $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        $this->authorize('show', $order);
        $order_rows = $order->order_rows;

        if (request()->wantsJson()) {
            return response()->json([
                'status' => true,
                'order' => $order,
                '$order_rows' => $order_rows
            ]);
        }

        return view('books.show', compact('order', 'order_rows')); // TODO change view
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $this->authorize('delete', $order);
        $order->delete();

        if (request()->expectsJson()) {
            return response(['status' => 'Order deleted']);
        }

        return back();
    }
}
