<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        'title', 'description', 'author_id', 'image'
    ];

    public function author()
    {
        return $this->hasOne(User::class, 'id', 'author_id');
    }
}
