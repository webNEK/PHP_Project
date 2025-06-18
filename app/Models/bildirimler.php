<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bildirimler extends Model
{
    protected $table = 'bildirimler';
    protected $primaryKey = 'NotificationID';
    public $timestamps = false; // Eğer created_at/updated_at yoksa

    protected $fillable = [
        'UserID',
        'Message',
        'Link',
        'CreatedAt',
        'Readed'
    ];

    // Bildirim ekle
    public static function addNotification($userID, $message, $link, $readed)
    {
        return self::create([
            'UserID'    => $userID,
            'Message'   => $message,
            'Link'      => $link,
            'CreatedAt' => now(),
            'Readed'    => $readed
        ]);
    }

    // Bildirimi ID ile getir
    public static function getNotification($notificationID)
    {
        return self::find($notificationID);
    }

    // Bildirimi güncelle
    public static function updateNotification($notificationID, $message, $link, $readed)
    {
        $notification = self::find($notificationID);
        if ($notification) {
            $notification->Message = $message;
            $notification->Link = $link;
            $notification->Readed = $readed;
            $notification->save();
            return $notification;
        }
        return null;
    }

    // Bildirimi sil
    public static function deleteNotification($notificationID)
    {
        $notification = self::find($notificationID);
        if ($notification) {
            return $notification->delete();
        }
        return false;
    }
}