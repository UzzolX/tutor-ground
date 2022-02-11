<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tution extends Model
{
    protected $fillable = ['user_id', 'student_id', 'title', 'slug', 'description', 'medium', 'category_id', 'class', 'address', 'location', 'status', 'last_date', 'number_of_student', 'group', 'gender', 'salary'];

    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function student()
    {
        return $this->belongsTo('App\Student');
    }



    public function users()
    {
        return $this->belongsToMany(User::class)->withTimeStamps();
    }
}
