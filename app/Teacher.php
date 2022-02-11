<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = [
        'tname', 'user_id', 'slug', 'address', 'phone', 'photo', 'description'
    ];

    public function jobs()
    {
        return $this->hasMany('App\Job');
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
