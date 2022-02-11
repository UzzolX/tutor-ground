<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'sname', 'user_id', 'slug', 'address', 'phone', 'photo', 'description'
    ];

    public function tutions()
    {
        return $this->hasMany('App\Tution');
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
