<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\yazılar;
use App\Models\PostTags;
use App\Models\Tags;

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

        $user = Session::get('user');
        if (!$user) return redirect('/Login');

        // Hangi butona basıldı?
        $status = $request->has('save') ? 'draft' : 'published';

        $post = yazılar::create([
            'UserID'    => $user['UserId'],
            'Title'     => $request->title,
            'Content'   => $request->content,
            'CreatedAt' => now(),
            'field'     => $request->field,
            'grade'     => $request->grade,
            'status'    => $status,
        ]);

        // Tag olarak field ve grade'i ekle
        $autoTags = [$request->field, $request->grade];
        foreach ($autoTags as $tagName) {
            $tag = Tags::firstOrCreate(['Name' => $tagName]);
            PostTags::addPostTag($post->PostID, $tag->TagID);
        }

        return redirect('/HomePage');
    }
    public function myDrafts()
    {
        $user = Session::get('user');
        $drafts = yazılar::where('UserID', $user['UserId'])->where('status', 'draft')->get();
        return view('MyDrafts', compact('drafts'));
    }

    public function edit($id)
    {
        $post = yazılar::findOrFail($id);
        return view('EditPost', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $post =yazılar::findOrFail($id);
        $post->update([
            'Title' => $request->title,
            'Content' => $request->content,
            'field' => $request->field,
            'grade' => $request->grade,
            'status' => $request->has('publish') ? 'published' : 'draft',
        ]);
        // Tag güncellemesi de eklenebilir
        return redirect('/HomePage');
    }
}
