<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    protected $fillable = [
        'paid', 'user_id'
    ];

    /** addBook to Order
     * @param array $row 'qty', 'book_id'
     * @return Model
     */
    public function addRow($row)
    {


        $order_rows = $this->order_rows;

        if ($order_rows->isEmpty()) {
            return $this->order_rows()->create($row);
        }

        foreach ($order_rows as $order_row) {

            if($order_row->book_id == $row['book_id']) {
                return $order_row->update(['qty' => $order_row->qty + $row['qty']]);
            }

        }

        return $this->order_rows()->create($row);
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function order_rows()
    {
        return $this->hasMany('App\OrderRow');
    }

}
