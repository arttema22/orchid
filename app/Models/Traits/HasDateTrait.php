<?php

namespace App\Models\Traits;

use Illuminate\Support\Carbon;

trait HasDateTrait
{
    /**
     * Аксессор
     * Преобразует дату из базы в нужный формат.
     * Формат лежит в config\app
     */
    public function getCreatedAtAttribute($value)
    {
        return Carbon::createFromTimestamp(strtotime($value))
            ->format(config('app.date_full_format'));
    }
    public function getUpdatedAtAttribute($value)
    {
        return Carbon::createFromTimestamp(strtotime($value))
            ->format(config('app.date_full_format'));
    }

    public function getDeletedAtAttribute($value)
    {
        return Carbon::createFromTimestamp(strtotime($value))
            ->format(config('app.date_full_format'));
    }
}
