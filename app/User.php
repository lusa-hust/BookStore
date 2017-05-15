<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'admin'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function reviews()
    {
        return $this->hasMany('App\Review');
    }

    public function getSubscribesAvailable()
    {
        return $this->hasMany('App\Subscribe')->where('available', true);
    }

    public function subscribes()
    {
        return $this->hasMany('App\Subscribe');
    }

    public function orders()
    {
        return $this->hasMany('App\Order')->orderBy('created_at', 'desc');
    }

    public function isAdmin()
    {
        if ($this->admin == true)
            return true;

        return false;
    }
}
