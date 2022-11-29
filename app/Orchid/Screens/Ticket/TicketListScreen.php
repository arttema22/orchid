<?php

namespace App\Orchid\Screens\Ticket;

use App\Models\Ticket;
use App\Orchid\Layouts\Ticket\TicketListTable;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;
use App\Http\Requests\TicketRequest;
use App\Orchid\Layouts\Ticket\CreateUpdateTicket;

use App\Orchid\Layouts\Charts\DynamicDayData;

class TicketListScreen extends Screen
{
    /**
     * Query data.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [

            'dynamicDayData' => [
                Ticket::where('status_id', 1)
                    ->countByDays(startDate: null, stopDate: null, dateColumn: 'created_at')
                    ->toChart('Новые'),
                Ticket::where('status_id', 2)
                    ->countByDays(startDate: null, stopDate: null, dateColumn: 'updated_at')
                    ->toChart('В работе'),
                Ticket::where('status_id', 3)
                    ->countByDays(startDate: null, stopDate: null, dateColumn: 'updated_at')
                    ->toChart('Закрытые'),
            ],

            'tickets' => Ticket::filters()
                ->defaultSort('created_at', 'desc')
                ->paginate(10)
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Обращения';
    }

    /**
     * Display description name.
     *
     * @return string|null
     */
    public function description(): ?string
    {
        return 'Список обращений';
    }

    public $permission = 'ticket.list';

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            ModalToggle::make('Новое')
                ->modal('createTicket')
                ->method('createOrUpdateTicket')
                ->class('btn btn-success')
                ->icon('plus'),
        ];
    }

    /**
     * Views.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            Layout::columns([
                DynamicDayData::class
            ]),

            TicketListTable::class,

            Layout::modal(
                'createTicket',
                CreateUpdateTicket::class
            )->title('Новое обращение')
                ->applyButton('Сохранить'),

            Layout::modal(
                'editTicket',
                CreateUpdateTicket::class
            )->async('asyncGetTicket'),
        ];
    }

    public function asyncGetTicket(Ticket $ticket)
    {
        return ['ticket' => $ticket];
    }

    public function createOrUpdateTicket(TicketRequest $request)
    {
        $ticketId = $request->input('ticket.id');
        Ticket::updateOrCreate(
            ['id' => $ticketId],
            array_merge(
                $request->validated()['ticket'],
                [
                    'status_id' => 1
                ]
            )
        );
        is_null($ticketId) ? Toast::info('Создано новое обращение') : Toast::info('Обращение обновлено');
    }
}
