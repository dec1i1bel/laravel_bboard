<?php

namespace App\Models;

/**
 * трейт HasFactory используется только при
 * автотестировании. 
 */
// use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Bbs extends Model
{
    // use HasFactory;

    /**
     * обоначаем поля таблицы БД для массового заполнения
     * через $model->create(['title' => 'содержимое поля', 'content' => 'содержимое поля', 'price' => цена integer])
     */
    protected $fillable = [
        'title',
        'content',
        'price'
    ];

    /**
     * вторая часть связи между таблицами для вторичной таблицы
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
