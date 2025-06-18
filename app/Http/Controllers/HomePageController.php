<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\yazılar; 


class HomePageController
{
        public function index()
    {
        $user = Session::get('user');
        // Kullanıcının ilgi alanına göre filtreleme örneği:
        // HomePageController.php
        $query = yazılar::query();
        if ($user && $user['field']) {
            $query->where('field', $user['field']);
        }
        $posts = $query->where('status', 'published')->orderBy('CreatedAt', 'desc')->take(10)->get();
        return view('HomePage', compact('user', 'posts'));
    }
}