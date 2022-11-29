<?php

namespace App\Orchid\Layouts\Order;

use App\Models\Order;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;
use Orchid\Screen\Actions\ModalToggle;

class OrderListTable extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'order';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [
            TD::make('created_at', 'Создано')->width('150px')->cantHide()->sort(),
            TD::make('Услуга')->render(function ($order) {
                ($order->service !== null) ? $name = $order->service->name : $name = 'Услуга была удалена из списка услуг.';
                return $name;
            })->width('250px')->cantHide(),
            TD::make('FullName', 'ФИО')->cantHide(),
            TD::make('message', 'Сообщение')->defaultHidden(),
            TD::make('organisation', 'Организация'),
            TD::make('address', 'Адрес'),
            TD::make('phone', 'Телефон')->width('150px')->filter(TD::FILTER_TEXT),
            TD::make('email', 'Почта')->filter(TD::FILTER_TEXT),
            TD::make('updated_at', 'Изменено')->width('150px')->defaultHidden()->sort(),
            TD::make('Статус')->render(function ($order) {
                return $order->status->name;
            })->cantHide(),
            TD::make()->render(function (Order $order) {
                return ModalToggle::make()
                    ->modal('editOrder')
                    ->method('createOrUpdateOrder')
                    ->modalTitle('Редактирование')
                    ->icon('pencil')
                    ->asyncParameters([
                        'order' => $order->id
                    ]);
            })->width('50px')->align(TD::ALIGN_RIGHT)->cantHide()
        ];
    }
}
