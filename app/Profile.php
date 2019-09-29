<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'user_id', 'skills_id', 'user_img', 'bio', 'last_name', 'age', 'gender', 'address', 'created_at', 'updated_at'
    ];
    public function user_image()
    {
        return $this->hasOne(Image::class, 'id', 'user_img');
    }
}
