<?php

namespace App\Http\Controllers;

use App\OrderRow;
use Illuminate\Http\Request;

class OrderRowsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\OrderRow  $orderRow
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OrderRow $orderRow)
    {
        $this->authorize('update', $orderRow);

        $this->validate($request, [
            'qty' => 'required|integer|min:1'
        ]);

        $orderRow->update([
            'qty' => request('qty')
        ]);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\OrderRow  $orderRow
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrderRow $orderRow)
    {
        $this->authorize('delete', $orderRow);
        $orderRow->delete();

        if (request()->expectsJson()) {
            return response(['status' => 'Row deleted']);
        }

        return back();
    }
}
