<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kullanicilar;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class LoginController
{
    public function login(Request $request)
    {
        $email = $request->input('email', '');
        $password = $request->input('password', '');

        $user = Kullanicilar::getByEmail($email);

        // Sütun adı veritabanında nasılsa ona göre kullanın!
        if ($user && Hash::check($password, $user->PasswordHash)) 
        {
            Session::put('user', $user->toArray());
            return redirect('/HomePage');
        } else 
        {
            return redirect('/Login');
        }
    }
}