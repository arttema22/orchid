<?php

namespace App\Models;

use App\Models\Traits\HasDateTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;
use Orchid\Filters\Filterable;
use App\Models\Traits\HasOrderTicketTrait;
use Orchid\Metrics\Chartable;

class Ticket extends Model
{
    use HasFactory, AsSource, Filterable, Chartable, HasOrderTicketTrait, HasDateTrait;

    /**
     * Получить ответы к обращению.
     */
    public function answer()
    {
        return $this->hasMany(Answer::class);
    }

    /**
     * Заполняемые поля
     * Список полей которые можно сохранять в базе
     */
    protected $fillable = [
        'first_name', 'last_name', 'patronymic', 'organisation',
        'ls', 'address', 'phone', 'email', 'title', 'message', 'status_id', 'code'
    ];

    /**
     * Сортировка
     * Список полей по которым можно сортировать
     */
    protected $allowedSorts =
    [
        'created_at', 'updated_at', 'status_id'
    ];

    /**
     * Фильтрация
     * Список полей по которым можно фильтровать
     */
    protected $allowedFilters =
    [
        'phone', 'email', 'ls'
    ];
}
