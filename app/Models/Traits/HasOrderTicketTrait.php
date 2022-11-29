<?php

namespace App\Models\Traits;

use Illuminate\Support\Str;
use Propaganistas\LaravelPhone\PhoneNumber;
use App\Models\Status;

trait HasOrderTicketTrait
{
    /**
     * Получить статус обращения
     */
    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    /**
     * Аксессор
     * Получить полностью ФИО
     */
    public function getFullNameAttribute()
    {
        return $this->last_name . ' ' . $this->first_name . ' ' . $this->patronymic;
    }

    /**
     * Мутатор
     * Присвоить Имени форматирование с большой буквы
     */
    public function setFirstNameAttribute($value)
    {
        $this->attributes['first_name'] = Str::ucfirst(Str::lower($value));
    }

    /**
     * Мутатор
     * Присвоить Фамилии форматирование с большой буквы
     */
    public function setLastNameAttribute($value)
    {
        $this->attributes['last_name'] = Str::ucfirst(Str::lower($value));
    }

    /**
     * Мутатор
     * Присвоить Отчеству форматирование с большой буквы
     */
    public function setPatronymicAttribute($value)
    {
        $this->attributes['patronymic'] = Str::ucfirst(Str::lower($value));
    }

    /**
     * Мутатор
     * Присвоить Номеру телефона форматирование
     */
    public function setPhoneAttribute($value)
    {
        $this->attributes['phone'] = Str::replace('+', '', PhoneNumber::make($value, 'RU')->formatE164());
    }
}
