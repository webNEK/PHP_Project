<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class yazı_kategori_ilişkisi extends Model
{
    protected $table = 'yazı_kategori_ilişkisi';
    public $timestamps = false;

    protected $fillable = [
        'PostID',
        'CategoryID'
    ];

    // Yeni ilişki ekle
    public static function addCategoryByPost($postID, $categoryID)
    {
        return self::create([
            'PostID'    => $postID,
            'CategoryID'=> $categoryID
        ]);
    }

    // Bir postun kategorilerini getir
    public static function getCategoriesByPost($postID)
    {
        return self::where('PostID', $postID)->pluck('CategoryID');
    }

    // Bir kategorinin yazılarını getir
    public static function getPostsByCategory($categoryID)
    {
        return self::where('CategoryID', $categoryID)->pluck('PostID');
    }

    // İlişkiyi sil
    public static function deletePostByCategory($postID, $categoryID)
    {
        return self::where('PostID', $postID)
                   ->where('CategoryID', $categoryID)
                   ->delete();
    }
}