<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $fillable = [
        'name',
        'last_name',
        'life_story',
        'author_year'
    ];

    public function Books()
    {
        return $this->hasMany('App/Models/Book');
    }
}
