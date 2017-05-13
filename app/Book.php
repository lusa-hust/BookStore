<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books';

    protected $fillable = [
        'title', 'author', 'price', 'qty', 'description'
    ];

    public function reviews()
    {
        return $this->hasMany('App\Review');
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
