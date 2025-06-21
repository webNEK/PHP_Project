<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kullanicilar;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class SignupController 
{
    public function showForm()
    {
        return view('Signup');
    }

    public function register(Request $request)
    {
        $request->validate([
            'fullname'          => 'required|string|max:255|unique:kullanicilar,Username',
            'email'             => 'required|email|unique:kullanicilar,Email',
            'password'          => 'required|min:4',
            'confirm_password'  => 'required|same:password',
        ]);
        $user = Kullanicilar::create([
            'Username'       => $request->input('fullname'),
            'Email'          => $request->input('email'),
            'PasswordHash'   => Hash::make($request->input('password')), // Şifreyi hashle!
            'DisplayName'    => $request->input('fullname'),
            'CreatedAt'      => now(),
            'years'          => null,
            'field'          => null,
        ]);

        Session::put('user', $user->toArray());
        return redirect('/Information');
    }
}