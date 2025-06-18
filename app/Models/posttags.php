<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostTags extends Model
{
    protected $table = 'posttags';
    public $timestamps = false;

    protected $fillable = [
        'PostID',
        'TagID'
    ];

    // Yeni ilişki ekle
    public static function addPostTag($postID, $tagID)
    {
        return self::create([
            'PostID' => $postID,
            'TagID'  => $tagID
        ]);
    }

    // Bir postun tüm taglarını getir
    public static function getTagsByPost($postID)
    {
        return self::where('PostID', $postID)->pluck('TagID');
    }

    // Bir tag'e ait tüm postları getir
    public static function getPostsByTag($tagID)
    {
        return self::where('TagID', $tagID)->pluck('PostID');
    }

    // İlişkiyi sil
    public static function deletePostTag($postID, $tagID)
    {
        return self::where('PostID', $postID)
                   ->where('TagID', $tagID)
                   ->delete();
    }
}