<?php

namespace App\Orchid\Layouts\Ticket;

use Orchid\Screen\Field;
use Orchid\Screen\Layouts\Rows;
use Orchid\Screen\Fields\Group;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\TextArea;

class CreateUpdateTicket extends Rows
{
    /**
     * Used to create the title of a group of form elements.
     *
     * @var string|null
     */
    protected $title;

    /**
     * Get the fields elements to be displayed.
     *
     * @return Field[]
     */
    protected function fields(): iterable
    {
        return [
            Input::make('ticket.id')->type('hidden'),
            Group::make([
                Input::make('ticket.last_name')->required()->title('Фамилия'),
                Input::make('ticket.first_name')->required()->title('Имя'),
                Input::make('ticket.patronymic')->title('Отчество'),
            ]),
            Group::make([
                Input::make('ticket.organisation')->title('Организация'),
                Input::make('ticket.ls')->title('Л/С')->mask('9999999999'),
            ]),
            Input::make('ticket.address')->required()->title('Адрес'),
            Group::make([
                Input::make('ticket.phone')->required()->type('tel')->mask('+9(999) 999-99-99')->title('Телефон'),
                Input::make('ticket.email')->required()->type('email')->title('Почта'),
            ]),
            Input::make('ticket.title')->required()->title('Тема'),
            TextArea::make('ticket.message')->required()->rows(5)->title('Обращение'),
        ];
    }
}
