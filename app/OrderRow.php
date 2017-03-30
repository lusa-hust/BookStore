<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderRow extends Model
{
    protected $table = 'order_rows';


    protected $fillable = [
        'qty'
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
