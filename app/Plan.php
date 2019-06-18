<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $fillable = ['title', 'season_id', 'address_id', 'price', 'access', 'content', 'image'];

    public function user()
    {
        return $this->belongTo('App\User');
    }

    public function season()
    {
        return $this->belongsTo('App\Season', 'season_id');
    }

    public function address()
    {
        return $this->belongsTo('App\Address', 'address_id');
    }
}
