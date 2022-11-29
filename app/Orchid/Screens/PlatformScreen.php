<?php

declare(strict_types=1);

namespace App\Orchid\Screens;

use App\Models\Order;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use App\Models\Ticket;

class PlatformScreen extends Screen
{
    /**
     * Query data.
     *
     * @return array
     */
    public function query(): iterable
    {
        $newTicket = Ticket::all()->where('status_id', 1)->count();
        $workTicket = Ticket::all()->where('status_id', 2)->count();
        $closeTicket = Ticket::all()->where('status_id', 3)->count();
        $allTicket = Ticket::all()->count();

        $newOrder = Order::all()->where('status_id', 1)->count();
        $workOrder = Order::all()->where('status_id', 2)->count();
        $closeOrder = Order::all()->where('status_id', 3)->count();
        $allOrder = Order::all()->count();

        return [
            'metrics' => [
                'ticket' => [
                    'new'    => ['value' => $newTicket],
                    'work' => ['value' => $workTicket],
                    'close'   => ['value' => $closeTicket],
                    'total'    => $allTicket,
                ],
                'order' => [
                    'new'    => ['value' => $newOrder],
                    'work' => ['value' => $workOrder],
                    'close'   => ['value' => $closeOrder],
                    'total'    => $allOrder,
                ],

            ],
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'За работу';
    }

    /**
     * Display header description.
     *
     * @return string|null
     */
    public function description(): ?string
    {
        return 'Добро пожаловать в электронную приемную.';
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Link::make('Сайт РКС-энерго')
                ->href('https://www.rks-energo.ru/')
                ->icon('globe-alt')
                ->target('_blanck'),
        ];
    }

    /**
     * Views.
     *
     * @return \Orchid\Screen\Layout[]
     */
    public function layout(): iterable
    {
        return [

            Layout::metrics([
                'Новые обращения'    => 'metrics.ticket.new',
                'Обращения в работе' => 'metrics.ticket.work',
                'Закрытые обращения' => 'metrics.ticket.close',
                'Всего обращений' => 'metrics.ticket.total',
            ]),

            Layout::metrics([
                'Новые запросы'    => 'metrics.order.new',
                'Запросы в работе' => 'metrics.order.work',
                'Закрытые запросы' => 'metrics.order.close',
                'Всего запросов' => 'metrics.order.total',
            ]),

            //Layout::view('platform::partials.welcome'),
        ];
    }
}
