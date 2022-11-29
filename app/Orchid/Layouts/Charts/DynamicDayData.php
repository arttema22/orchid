<?php

namespace App\Orchid\Layouts\Charts;

use Orchid\Screen\Layouts\Chart;
use App\Models\Ticket;

class DynamicDayData extends Chart
{

    protected $title = 'Динамика работы по дням';

    /**
     * Available options:
     * 'bar', 'line',
     * 'pie', 'percentage'.
     *
     * @var string
     */
    protected $type = 'line';

    protected $target = 'dynamicDayData';

    protected $height = 200;

    /**
     * Colors used.
     *
     * @var array
     */
    protected $colors = [
        '#9FC110',
        '#2093CA',
        '#1F2A30',
    ];

    /**
     * Determines whether to display the export button.
     *
     * @var bool
     */
    protected $export = false;
}
