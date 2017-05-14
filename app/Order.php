<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    /** addBook to Order
     * @param array $book 'qty', 'book_id'
     * @return Model
     */
    public function addBook($book)
    {
        return $this->order_rows()->create($book);
    }

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function order_rows() {
        return $this->hasMany('App\OrderRow');
    }

}
