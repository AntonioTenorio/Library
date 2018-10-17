<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    function category(){
        return $this->hasOne('App\Models\Categories', 'id', 'category_id');
    }
}
