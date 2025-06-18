<?php

namespace App\Http\Controllers;
use App\Models\Begeniler;
use App\Models\yazılar;

class ListController
{
    public function likedList()
    {
        $user = session('user');
        if (!$user) return redirect('/Login');

        // Kullanıcının beğendiği post ID'leri
        $likedPostIDs = Begeniler::where('UserID', $user['UserId'])->pluck('PostID');
        // O postları getir
        $posts = yazılar::whereIn('PostID', $likedPostIDs)->where('status', 'published')->get();

        return view('List', compact('user', 'posts'));
    }
}
