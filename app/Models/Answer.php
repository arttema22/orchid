<?php

namespace App\Models;

use App\Models\Traits\HasDateTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

class Answer extends Model
{
    use HasFactory, AsSource, HasDateTrait;

    /**
     * Получить обращение, которому принадлежит ответ.
     */
    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }

    /**
     * Получить автора, которому принадлежит ответ.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Заполняемые поля
     * Список полей которые можно сохранять в базе
     */
    protected $fillable = [
        'user_id', 'ticket_id', 'message'
    ];
}
