<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function tutions()
    {
        return $this->hasMany(Tution::class);
    }
}
