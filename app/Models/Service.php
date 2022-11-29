<?php

namespace App\Models;

use App\Models\Traits\HasSetupTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;
use Orchid\Filters\Filterable;
use App\Models\Order;
use App\Models\Traits\HasDateTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use HasFactory, AsSource, Filterable, HasSetupTrait, HasDateTrait, SoftDeletes;

    protected $fillable = ['name'];

    protected $allowedSorts = ['name'];

    protected $allowedFilters = ['name'];

    /**
     * Получить заявки.
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
