<?php
namespace App\Http\Controllers;
use App\Models\kullanicilar;

use Illuminate\Http\Request;

class accountController
{

public function account()
{
    $userArr = session('user');
    if (!$userArr) 
    return redirect('/Login');
    $user = kullanicilar::find($userArr['UserId']);
    return view('account', compact('user'));
}
}
