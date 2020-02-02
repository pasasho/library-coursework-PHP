<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'book_name', 'author_id', 'genre_id', 'image_id',
    ];
}
