<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'author_id', 'title', 'image', 'creation_year', 'description'
    ];

    public function Author()
    {
        return $this->belongsTo('App\Models\Author');
    }

    public function Genres()
    {
        return $this->belongsToMany('App\Models\Genre', "book-genre");
    }
}
