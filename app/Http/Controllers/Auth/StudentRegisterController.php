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

        $this->validate($request, [
            'tname' => 'required|string|max:60',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed'
        ]);

        $user =  User::create([
            'email' => request('email'),
            'password' => Hash::make(request('password')),
            'user_type' => request('user_type'),
        ]);
        Student::create([
            'user_id' => $user->id,
            'sname' => request('sname'),
            'slug' => str_slug(request('sname'))

        ]);
        $user->sendEmailVerificationNotification();

        return redirect()->back()->with('message', 'A verification link is sent to your email. Please follow the link to verify it');
    }
}
