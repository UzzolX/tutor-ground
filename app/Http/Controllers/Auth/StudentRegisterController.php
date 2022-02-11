<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\User;
use App\Student;
use Hash;
use App\Http\Controllers\Controller;

class StudentRegisterController extends Controller
{
    public function studentRegister(Request $request)
    {

        $user =  User::create([
            'name' => request('sname'),
            'email' => request('email'),
            'password' => Hash::make(request('password')),
            'user_type' => request('user_type'),
        ]);
        Student::create([
            'user_id' => $user->id,
            'sname' => request('sname'),
            'slug' => str_slug(request('sname'))

        ]);
        return redirect()->back()->with('message', 'Sucess');
    }
}
