<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = 'reviews';


    protected $fillable = [
        'review', 'vote', 'user_id'
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function book() {
        return $this->belongsTo('App\Book');
    }
}
