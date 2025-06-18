<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Begeniler extends Model
{
    protected $table = 'begeniler';
    protected $primaryKey = 'LikeID';
    public $timestamps = false; // Eğer created_at/updated_at yoksa

    protected $fillable = [
        'PostID',
        'UserID',
        'CreatedAt'
    ];

    // Yeni beğeni ekle
    public static function addLike($postID, $userID)
    {
        return self::create([
            'PostID' => $postID,
            'UserID' => $userID,
            'CreatedAt' => now()
        ]);
    }

    // Beğeniyi ID ile getir
    public static function getLike($likeID)
    {
        return self::find($likeID);
    }

    // Beğeniyi güncelle
    public static function updateLike($likeID, $postID, $userID)
    {
        $like = self::find($likeID);
        if ($like) {
            $like->PostID = $postID;
            $like->UserID = $userID;
            $like->save();
            return $like;
        }
        return null;
    }

    // Beğeniyi sil
    public static function deleteLike($likeID)
    {
        $like = self::find($likeID);
        if ($like) {
            return $like->delete();
        }
        return false;
    }
}