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
     * @param  array review ['review', 'vote', 'user_id']
     * @return Reply
     */
    public function addReview($review)
    {
        return $this->reviews()->create($review);
    }

    public function addSubscribe($subscribe)
    {
        return $this->subscribes()->create($subscribe);
    }

    public function getSubscribe($user)
    {
        return $this->subscribes()->where('user_id', $user->id);
    }

    public function removeSubscribe($user)
    {
        return $this->getSubscribe($user)->delete();
    }

    public function subscribes()
    {
        return $this->hasMany('App\Subscribe');
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

    protected static function boot()
    {
        static::saved(function ($book) {
            if ($book->qty > 0) {

                if ($book->subscribes->isNotEmpty()) {

                    foreach ($book->subscribes as $subscribe) {
                        $subscribe->update([
                            'available' => true
                        ]);
                    }
                }
            } else {
                if ($book->subscribes->isNotEmpty()) {

                    foreach ($book->subscribes as $subscribe) {
                        $subscribe->update([
                            'available' => false
                        ]);
                    }
                }
            }
        });

        static::updated(function ($book) {
            if ($book->qty > 0) {

                if ($book->subscribes->isNotEmpty()) {

                    foreach ($book->subscribes as $subscribe) {
                        $subscribe->update([
                            'available' => true
                        ]);
                    }
                }
            } else {
                if ($book->subscribes->isNotEmpty()) {

                    foreach ($book->subscribes as $subscribe) {
                        $subscribe->update([
                            'available' => false
                        ]);
                    }
                }
            }
        });

    }
}
