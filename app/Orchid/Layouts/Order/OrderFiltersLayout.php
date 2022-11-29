<?php

namespace App\Orchid\Layouts\Order;

use App\Orchid\Filters\RoleFilter;
use App\Orchid\Filters\ServiceFilter;
use Orchid\Filters\Filter;
use Orchid\Screen\Layouts\Selection;
use Orchid\Screen\Fields\Group;

class OrderFiltersLayout extends Selection
{
    /**
     * @return string[]|Filter[]
     */
    public function filters(): array
    {
        return [
            ServiceFilter::class,
        ];
    }
}
