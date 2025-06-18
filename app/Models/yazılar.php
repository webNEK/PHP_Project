<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class yazılar extends Model
{
    protected $table = 'yazilar';
    protected $primaryKey = 'PostID';
    public $timestamps = false; // Eğer created_at/updated_at yoksa

    protected $fillable = [
        'UserID',
        'Title',
        'Content',
        'CreatedAt',
        'field',
        'grade',
        'status'
    ];

    // Yeni içerik ekle
    public static function addContent($userID, $title, $content)
    {
        return self::create([
            'UserID'    => $userID,
            'Title'     => $title,
            'Content'   => $content,
            'CreatedAt' => now()
        ]);
    }

    // Post getir (PostID ile)
    public static function getContent($postID)
    {
        return self::find($postID);
    }

    // Post güncelle (Title ve Content)
    public static function updateContent($postID, $title, $content)
    {
        $post = self::find($postID);
        if ($post) {
            $post->Title = $title;
            $post->Content = $content;
            // Eğer UpdateAt alanı varsa:
            if (isset($post->UpdateAt)) {
                $post->UpdateAt = now();
            }
            $post->save();
            return $post;
        }
        return null;
    }

    // Post sil
    public static function deleteContent($postID)
    {
        $post = self::find($postID);
        if ($post) {
            return $post->delete();
        }
        return false;
    }
}