<?php

namespace App;

use App\User;
use App\Book;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function books()
    {
        return $this->hasMany(Book::class);
    }

    function followers()
    {
        return $this->belongsToMany('App\User', 'followers', 'user_id', 'follower_id');
    }

    function following()
    {
        return $this->belongsToMany('App\User', 'followers', 'follower_id', 'user_id');
    }

    function follow(User $user) {
        $this->followers()->attach($user->id);
    }

    function unfollow(User $user) {
        $this->followers()->detach($user->id);
    }
}
