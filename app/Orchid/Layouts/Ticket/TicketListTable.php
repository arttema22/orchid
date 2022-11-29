<?php

namespace App\Orchid\Layouts\Ticket;

use App\Models\Ticket;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Button;

class TicketListTable extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'tickets';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [
            TD::make('created_at', 'Создано')->width('150px')->cantHide()->sort(),
            TD::make('title', 'Тема')->cantHide()->render(function ($ticket) {
                return Link::make($ticket->title)
                    ->route('ticket.open', $ticket->id);
            }),
            TD::make('message', 'Обращение')->defaultHidden(),
            TD::make('FullName', 'ФИО')->cantHide()->render(function ($ticket) {
                return Link::make($ticket->FullName)
                    ->route('ticket.open', $ticket->id);
            }),
            TD::make('organisation', 'Организация'),
            TD::make('ls', 'Л/С')->width('150px')->popover('Лицевой счет')->filter(TD::FILTER_TEXT),
            TD::make('address', 'Адрес'),
            TD::make('phone', 'Телефон')->width('150px')->filter(TD::FILTER_TEXT),
            TD::make('email', 'Почта')->filter(TD::FILTER_TEXT),
            TD::make('updated_at', 'Изменено')->width('150px')->defaultHidden()->sort(),
            TD::make('Статус')->render(function ($tickets) {
                return $tickets->status->name;
            })->cantHide(),
            // TD::make()->render(function (Ticket $ticket) {
            //     return ModalToggle::make()
            //         ->modal('editTicket')
            //         ->method('createOrUpdateTicket')
            //         ->modalTitle('Редактирование')
            //         ->icon('pencil')
            //         ->asyncParameters([
            //             'ticket' => $ticket->id
            //         ]);
            // })->width('50px')->align(TD::ALIGN_RIGHT)->cantHide(),
            // TD::make(__('Actions'))
            //     ->align(TD::ALIGN_CENTER)
            //     ->width('100px')
            //     ->render(fn (Ticket $ticket) => DropDown::make()
            //         ->icon('options-vertical')
            //         ->list([

            //             Link::make('Открыть')
            //                 ->route('ticket.open', $ticket->id)
            //                 ->icon('pencil'),

            //             Button::make(__('Delete'))
            //                 ->icon('trash')
            //                 ->confirm(__('Once the account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.'))
            //                 ->method('remove', [
            //                     'id' => $ticket->id,
            //                 ]),
            //         ])),

            TD::make()->render(function (Ticket $ticket) {
                return Link::make('Открыть')
                    ->route('ticket.open', $ticket->id)
                    ->icon('pencil');
            })->width('50px')->align(TD::ALIGN_RIGHT)->cantHide(),
        ];
    }
}
