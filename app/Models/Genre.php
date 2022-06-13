<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    public function Books()
    {
        return $this->belongsToMany('App\Models\Book', "book_genre");
    }
}
