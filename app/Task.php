<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'title', 'description', 'author_id', 'resources', 'group_id'
    ];

    public function author()
    {
        return $this->hasOne(User::class, 'id', 'author_id');
    }
}
