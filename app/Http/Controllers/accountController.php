<?php
namespace App\Http\Controllers;
use App\Models\kullanicilar;

use App\Models\yazılar;
use Illuminate\Http\Request;

class accountController
{

    public function account()
    {
        $userArr = session('user');
        $user = kullanicilar::find($userArr['UserId']);
        if($user->field == 'admin'){
            $posts = yazılar::all();
        }else{
            $posts = yazılar::where('UserId', $user->UserId)->get();
        }
        
        return view('account', compact('user', 'posts'))    ;
    }

    public function deleteAccount()
    {
        $userArr = session('user');
        $user = kullanicilar::find($userArr['UserId']);
        if ($user) {
            $user->delete();
            session()->forget('user');
        }
        return redirect('/Signup')->with('success', 'Your account has been deleted.');
    }
    public function logout()
    {
        session()->forget('user');
        return redirect('/Login')
            ->withCookie(cookie('remembered_login', '', -1))
            ->with('success', 'You have been logged out.');
    }
}
