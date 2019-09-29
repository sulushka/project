<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Skill;

class Group extends Model
{
    public function skills()
    {
        return $this->hasOne(Skill::class, 'id');
    }
}
