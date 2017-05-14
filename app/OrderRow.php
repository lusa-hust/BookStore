<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderRow extends Model
{
    protected $table = 'order_rows';

    protected $with = ['book'];

    protected $fillable = [
        'qty', 'book_id'
    ];

    function order()
    {
        return $this->belongsTo('App\Order');
    }

    function book()
    {
        return $this->belongsTo('App\Book');
    }
}
