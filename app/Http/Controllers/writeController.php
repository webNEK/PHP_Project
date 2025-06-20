<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\yazılar;

class writeController
{
public function store(Request $request)
{
    $request->validate([
        'title'   => 'required|string|max:255',
        'content' => 'required|string',
        'field'   => 'required|string',
        'grade'   => 'required|string',
    ]);

    $user = session('user');
    // Varsayılan olarak draft
    $status = 'draft';
    if ($request->has('publish')) {
        $status = 'published';
    }

    // Eğer id varsa, güncelle
    if ($request->has('id')) {
        $post = yazılar::find($request->id);
        
        if ($user['field'] != 'admin' && (!$post || $post->UserID != $user['UserId'])) {
            abort(403, 'Bu gönderiyi güncelleme yetkiniz yok.');
        }

        $post->update([
            'Title'   => $request->title,
            'Content' => $request->content,
            'field'   => $request->field,
            'grade'   => $request->grade,
            'status'  => $status,
        ]);
    } else {
        // Yeni post: publish butonuna basıldıysa published, yoksa draft
        $post = yazılar::create([
            'UserID'    => $user['UserId'],
            'Title'     => $request->title,
            'Content'   => $request->content,
            'CreatedAt' => now(),
            'field'     => $request->field,
            'grade'     => $request->grade,
            'status'    => $status,
        ]);
    }

    return redirect('/HomePage');
}
    public function myDrafts()
    {
        $user = Session::get('user');
        $drafts = yazılar::where('UserID', $user['UserId'])->where('status', 'draft')->get();
        return view('MyDrafts', compact('drafts'));
    }
    
    public function show(Request $request)
    {
        $user = session('user');
        $post = null;
        if ($request->has('id')) {
            $post = yazılar::find($request->id);
        if ($user['field'] != 'admin' && (!$post || $post->UserID != $user['UserId'])) {
            abort(403, 'Bu gönderiyi güncelleme yetkiniz yok.');
        }

        }
        return view('write', compact('post'));
    }

    public function delete($id)
    {
        $user = session('user');
        $post = yazılar::find($id);

        // Hem field hem email ile admin kontrolü
        $isAdmin = ($user['field'] == 'admin');
        if ($user && $isAdmin) {
            if ($post) $post->delete();
            return redirect('/Account')->with('success', 'Post deleted successfully.');
        }
        if ($user['field'] != 'admin' && (!$post || $post->UserID != $user['UserId'])) {
            abort(403, 'Bu gönderiyi güncelleme yetkiniz yok.');
        }


        $post->delete();

        return redirect('/Account')->with('success', 'Post deleted successfully.');
    }

}
