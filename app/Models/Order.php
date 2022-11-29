<?php

namespace App\Models;

use App\Models\Traits\HasDateTrait;
use App\Models\Traits\HasOrderTicketTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;
use Orchid\Filters\Filterable;
use Orchid\Metrics\Chartable;

class Order extends Model
{
    use HasFactory, AsSource, Filterable, Chartable, HasOrderTicketTrait, HasDateTrait;

    /**
     * Заполняемые поля
     * Список полей которые можно сохранять в базе
     */
    protected $fillable = [
        'first_name', 'last_name', 'patronymic', 'organisation', 'address', 'phone', 'email', 'service_id', 'message', 'status_id'
    ];

    /**
     * Сортировка
     * Список полей по которым можно сортировать
     */
    protected $allowedSorts =
    [
        'created_at', 'updated_at', 'service_id', 'status_id'
    ];

    /**
     * Фильтрация
     * Список полей по которым можно фильтровать
     */
    protected $allowedFilters =
    [
        'phone', 'email'
    ];

    /**
     * Получить название услуги
     */
    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
