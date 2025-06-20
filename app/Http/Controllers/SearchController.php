<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\yazılar;

class SearchController
{
    public function search(Request $request)
    {
        $query = $request->input('search');
        $posts = collect();
        if ($query) {
            $posts = yazılar::where('status', 'published')
                ->where('Content', 'like', '%' . $query . '%')
                ->orderBy('CreatedAt', 'desc')
                ->get();
        }
        return view('Search', compact('posts', 'query'));
    }
}