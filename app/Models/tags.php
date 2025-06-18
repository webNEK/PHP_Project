<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    protected $table = 'tags';
    protected $primaryKey = 'TagID';
    public $timestamps = false; // Eğer created_at/updated_at yoksa

    protected $fillable = [
        'Name',
        'CreatedAt'
    ];

    // Yeni tag ekle
    public static function addTag($name)
    {
        return self::create([
            'Name' => $name,
            'CreatedAt' => now()
        ]);
    }

    // Tag'i ID ile getir
    public static function getTag($tagID)
    {
        return self::find($tagID);
    }

    // Tag'i güncelle
    public static function updateTag($tagID, $name)
    {
        $tag = self::find($tagID);
        if ($tag) {
            $tag->Name = $name;
            $tag->save();
            return $tag;
        }
        return null;
    }

    // Tag'i sil
    public static function deleteTag($tagID)
    {
        $tag = self::find($tagID);
        if ($tag) {
            return $tag->delete();
        }
        return false;
    }
}