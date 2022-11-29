<?php

namespace App\Models\Traits;

use Illuminate\Support\Str;

trait HasSetupTrait
{
    /**
     * Мутатор
     * Присвоить Имени форматирование - с большой буквы
     */
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = Str::ucfirst(Str::lower($value));
    }
}
