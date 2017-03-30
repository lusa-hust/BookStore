<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category_lists';

    protected $fillable = [
        'name'
    ];

    public function books(){
        return $this->belongsToMany('App\Book', 'category_book');
    }
}
