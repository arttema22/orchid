<?php

namespace App\Orchid\Layouts\Order;

use Orchid\Screen\Field;
use Orchid\Screen\Layouts\Rows;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Group;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Fields\Select;
use App\Models\Service;

class CreateUpdateOrder extends Rows
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
            Input::make('order.id')->type('hidden'),
            Select::make('order.service_id')
                ->fromModel(Service::class, 'name')->required()->title('Услуга')->empty('Выбрать услугу', 0),
            Group::make([
                Input::make('order.last_name')->required()->title('Фамилия'),
                Input::make('order.first_name')->required()->title('Имя'),
                Input::make('order.patronymic')->title('Отчество'),
            ]),
            Input::make('order.organisation')->title('Организация'),
            Input::make('order.address')->required()->title('Адрес'),
            Group::make([
                Input::make('order.phone')->required()->type('tel')->mask('+9(999) 999-99-99')->title('Телефон'),
                Input::make('order.email')->required()->type('email')->title('Почта'),
            ]),
            TextArea::make('order.message')->rows(5)->title('Описание вопроса'),
        ];
    }
}
