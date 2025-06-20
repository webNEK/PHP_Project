<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kullanicilar;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class AdminLoginController
{
    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        $user = Kullanicilar::where('Email', $request->email)->first();

        // Sadece admin email veya rol kontrolü
        if ($user && Hash::check($request->password, $user->PasswordHash) && $user->Email === 'admin@admin') {
            Session::put('user', $user->toArray());
            Session::put('is_admin', true);
            
            return redirect('/HomePage'); // Admin paneline yönlendir
        }

        return redirect('/AdminLogin')->withErrors(['email' => 'Unauthorized. Only admin can login here.']);
    }
}