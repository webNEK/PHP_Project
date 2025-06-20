<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kullanicilar extends Model
{
    protected $table = 'kullanicilar';
    protected $primaryKey = 'UserId'; // Eğer tablo UserId ile tanımlıysa
    public $timestamps = false; // Eğer created_at/updated_at yoksa

    // Eğer mass assignment için alanlar:
    protected $fillable = [
        'Username', 'Email', 'PasswordHash', 'DisplayName', 'CreatedAt', 'years', 'field'
    ];

    // Eloquent ile ekstra fonksiyonlar ekleyebilirsiniz
    public static function getByEmail($email)
    {
        return self::where('Email', $email)->first();
    }
}