<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    public function categorySeason()
    {
        return $this->hasOne('App\Plan');
    }
}
