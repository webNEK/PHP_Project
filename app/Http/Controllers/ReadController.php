<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\yazılar;
use App\Models\Yorumlar;
use App\Models\Begeniler;
use App\Models\kullanicilar;

class ReadController 
{
    public function show(Request $request)
    {
        $postID = $request->query('id');
        if (!$postID) {
            abort(404);
        }

        $post = yazılar::find($postID);
        if (!$post) {
            abort(404);
        }

        $comments = Yorumlar::getByPost($postID);

            // Her yorum için kullanıcı adını ekle
        foreach ($comments as $comment) {
            $user = kullanicilar::find($comment->UserID);
            $comment->Username = $user ? $user->Username : 'Unknown';
        }

        $likeCount = Begeniler::where('PostID', $postID)->count();
        $user = session('user');
        $userLiked = false;
        if ($user) {
            $userLiked = Begeniler::where('PostID', $postID)
                ->where('UserID', $user['UserId'])
                ->exists();
        }

        $author = Kullanicilar::where('UserId', $post->UserID)->first();


        return view('Read', [
        'post' => $post,
        'comments' => $comments,
        'likeCount' => $likeCount,
        'userLiked' => $userLiked,
        'author' => $author
    ]);
    }

    // Yorum ekleme örneği
    public function addComment(Request $request)
    {
        $request->validate([
            'comment' => 'required|string|max:1000',
            'post_id' => 'required|integer|exists:yazilar,PostID'
        ]);
        $user = session('user');
        if (!$user) return redirect('/Login');

        Yorumlar::addPost($request->post_id, $user['UserId'], $request->comment);
        return redirect('/Read?id=' . $request->post_id);
    }

    // Beğeni ekleme örneği
    public function like(Request $request)
    {
        $request->validate([
            'post_id' => 'required|integer|exists:yazilar,PostID'
        ]);
        $user = session('user');
        if (!$user) return response()->json(['error' => 'Unauthorized'], 401);

        $like = Begeniler::where('PostID', $request->post_id)
            ->where('UserID', $user['UserId'])
            ->first();

        if ($like) {
            // Zaten beğenmişse geri çek
            $like->delete();
            $liked = false;
        } else {
            // Beğeniyi ekle
            Begeniler::addLike($request->post_id, $user['UserId']);
            $liked = true;
        }

        $likeCount = Begeniler::where('PostID', $request->post_id)->count();

        return response()->json([
            'liked' => $liked,
            'likeCount' => $likeCount
        ]);
    }
}