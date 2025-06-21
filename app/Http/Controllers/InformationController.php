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

        $user = Kullanicilar::find($userArr['UserId']);
        if (!$user) {
            return redirect('/Login');
        }

        $user->years = $request->input('study-year');
        $user->field = $request->input('field');
        $user->save();

        Session::put('user', $user->toArray());

        return redirect('/HomePage');
    }
}