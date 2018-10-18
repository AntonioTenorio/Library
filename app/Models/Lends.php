<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lends extends Model
{
    function book(){
        return $this->hasOne('App\Models\Books', 'id', 'book_id');
    }

    function user(){
        return $this->hasOne('App\User', 'id', 'user_id');
    }
}
