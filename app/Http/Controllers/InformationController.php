<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Kullanicilar;

class InformationController
{
    public function Information(Request $request)
    {
        // Validasyon
        $request->validate([
            'study-year' => 'required',
            'field'      => 'required',
        ]);

        // Oturumdan kullanıcıyı al
        $userArr = Session::get('user');
        if (!$userArr) {
            return redirect('/Login');
        }

        // Kullanıcıyı veritabanından bul
        $user = Kullanicilar::find($userArr['UserId']);
        if (!$user) {
            return redirect('/Login');
        }

        // Alanları güncelle
        $user->years = $request->input('study-year');
        $user->field = $request->input('field');
        $user->save();

        // Session'ı güncelle
        Session::put('user', $user->toArray());

        // HomePage'e yönlendir
        return redirect('/HomePage');
    }
}