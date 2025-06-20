<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Yorumlar extends Model
{
    protected $table = 'yorumlar';
    protected $primaryKey = 'CommentID';
    public $timestamps = false; // Eğer created_at/updated_at yoksa

    protected $fillable = [
        'PostID',
        'UserID',
        'Content',
        'CreatedAt'
    ];

    // Yeni yorum ekle
    public static function addPost($postID, $userID, $content)
    {
        return self::create([
            'PostID'    => $postID,
            'UserID'    => $userID,
            'Content'   => $content,
            'CreatedAt' => now()
        ]);
    }

    // Yorum getir (CommentID ile)
    public static function getPost($commentID)
    {
        return self::find($commentID);
    }

    // Posta ait tüm yorumları getir (PostID ile)
    public static function getByPost($postID)
    {
        return self::where('PostID', $postID)
                   ->orderBy('CreatedAt', 'desc')
                   ->get();

    }

    // Yorum güncelle (Content)
    public static function updatePost($commentID, $content)
    {
        $comment = self::find($commentID);
        if ($comment) {
            $comment->Content = $content;
            $comment->save();
            return $comment;
        }
        return null;
    }

    // Yorum sil
    public static function deletePost($commentID)
    {
        $comment = self::find($commentID);
        if ($comment) {
            return $comment->delete();
        }
        return false;
    }
}