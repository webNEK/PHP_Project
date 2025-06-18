<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Takipciler extends Model
{
    protected $table = 'takipciler';
    public $timestamps = false;

    protected $primaryKey = 'FolloweID'; // Eğer birincil anahtar buysa
    protected $fillable = [
        'FolloweID',
        'FollowesID',
        'CreatedAt'
    ];

    // Yeni takip ilişkisi ekle
    public static function addFollower($followerID, $followesID)
    {
        return self::create([
            'FolloweID'  => $followerID,
            'FollowesID' => $followesID,
            'CreatedAt'  => now()
        ]);
    }

    // Takipçiyi ID ile getir
    public static function getFollower($followeID)
    {
        return self::find($followeID);
    }

    // Takip ilişkisini sil
    public static function deleteFollower($followeID)
    {
        $follower = self::find($followeID);
        if ($follower) {
            return $follower->delete();
        }
        return false;
    }

    // Bir kişinin tüm takipçilerini getir
    public static function getFollowersOf($followesID)
    {
        return self::where('FollowesID', $followesID)->get();
    }
}