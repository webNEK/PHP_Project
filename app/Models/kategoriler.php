<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategoriler extends Model
{
    protected $table = 'kategoriler';
    protected $primaryKey = 'CategoryID';
    public $timestamps = false; // Eğer created_at/updated_at yoksa

    protected $fillable = [
        'CategoryID',
        'Name'
    ];

    // Yeni kategori ekle
    public static function addCategory($categoryID, $name)
    {
        return self::create([
            'CategoryID' => $categoryID,
            'Name' => $name
        ]);
    }

    // Kategoriyi ID ile getir
    public static function getCategory($categoryID)
    {
        return self::find($categoryID);
    }

    // Kategoriyi güncelle
    public static function updateCategory($categoryID, $name)
    {
        $category = self::find($categoryID);
        if ($category) {
            $category->Name = $name;
            $category->save();
            return $category;
        }
        return null;
    }

    // Kategoriyi sil
    public static function deleteCategory($categoryID)
    {
        $category = self::find($categoryID);
        if ($category) {
            return $category->delete();
        }
        return false;
    }
}