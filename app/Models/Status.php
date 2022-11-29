<?php

namespace App\Models;

use App\Models\Traits\HasSetupTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;
use App\Models\Ticket;
use App\Models\Traits\HasDateTrait;

class Status extends Model
{
    use HasFactory, AsSource, Filterable, HasSetupTrait, HasDateTrait;

    protected $fillable = ['name'];

    protected $allowedSorts = ['id'];

    /**
     * Получить обращения.
     */
    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
