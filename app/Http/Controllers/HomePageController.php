<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\yazılar; 


class HomePageController
{
    public function greeting()
    {
        now()->setTimezone('Europe/Istanbul');
        $hour = now()->format('H');
        if ($hour >= 5 && $hour < 12) {
            return 'Good Morning!';
        } else if ($hour >= 12 && $hour < 18) {
            return 'Good Afternoon!';
        } else if ($hour >= 18 && $hour < 22) {
            return 'Good Evening!';
        } else {
            return 'Good Night!';
        }
    }
    public function index()
    {
        $user = Session::get('user');
        $time = $this->greeting();

        if ($user['field'] == 'admin') {
            $posts = yazılar::where('status', 'published')
                ->orderBy('CreatedAt', 'desc')
                ->get();
        } elseif ($user && $user['field']) {
            $posts = yazılar::where('status', 'published')
                ->whereIn('field', [$user['field'], 'admin'])
                ->orderBy('CreatedAt', 'desc')
                ->get();
        }

        return view('HomePage', compact('user', 'posts', 'time'));
    }

}