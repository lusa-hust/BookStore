<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books';

    protected $fillable = [
        'title', 'author', 'price', 'qty', 'description', 'image'
    ];

    /**
     * Add a review to the book.
     *
     * @param  array review
     * @return Reply
     */
    public function addReview($review)
    {
        return $this->reviews()->create($review);
    }

    public function reviews()
    {
        return $this->hasMany('App\Review')->orderBy('created_at', 'desc');
    }

    public function orderRows()
    {
        return $this->hasMany('App\OrderRow');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Category', 'category_book');
    }
}
