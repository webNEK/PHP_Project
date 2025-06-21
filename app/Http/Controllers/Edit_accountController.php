<?php

namespace App\Http\Controllers;

use App\Models\kullanicilar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class Edit_accountController
{
    public function edit()
    {
        $userArr = session('user');
        $user = kullanicilar::find($userArr['UserId']);
        return view('Edit_account', compact('user'));
    }

    public function update(Request $request)
    {
        $userArr = session('user');
        $user = kullanicilar::find($userArr['UserId']);

        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email',
            'field' => 'required',
            'grade' => 'required',
        ]);

        $user->Username = $request->input('name');
        $user->Email = $request->input('email');
        $user->field = $request->input('field');
        $user->years = $request->input('grade');
        $user->save();

        session(['user' => $user->toArray()]);

        return redirect('/Account')->with('success', 'Account updated!');
    }
}