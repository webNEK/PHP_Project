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
        if ($user && Hash::check($password, $user->PasswordHash)) 
        {
            Session::put('user', $user->toArray());
            $response = redirect('/HomePage');
            if ($request->has('remember')) {
                $loginData = [
                    'email' => $email,
                    'password' => $password,
                    'remember' => true
                ];
                $response->withCookie(cookie('remembered_login', json_encode($loginData), 60*24));
            } else {
                $response->withCookie(cookie('remembered_login', '', -1));
            }
            return $response;
        }
        return redirect('/Login')->withErrors(['email' => 'Invalid email or password.']);
    }

}