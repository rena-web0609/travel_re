<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $fillable = ['title', 'season', 'price', 'access', 'content', 'image'];

    public function user()
    {
        return $this->belongTo('App\User');
    }
}
