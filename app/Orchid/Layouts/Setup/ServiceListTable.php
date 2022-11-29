<?php

namespace App\Orchid\Layouts\Setup;

use App\Models\Service;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\TD;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Actions\Button;

class ServiceListTable extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'services';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [
            TD::make('name', 'Название')->cantHide()->sort()->filter(TD::FILTER_TEXT),
            TD::make('created_at', 'Дата создания')->defaultHidden(),
            TD::make('updated_at', 'Дата изменения')->defaultHidden()->popover('Дата, когда было внесено последнее изменение в названии статуса.'),
            TD::make('action', '')
                ->render(fn (Service $service) => DropDown::make()
                    ->icon('options-vertical')
                    ->list([

                        ModalToggle::make(__('Edit'))
                            ->modal('editService')
                            ->method('createOrUpdateService')
                            ->modalTitle('Редактирование сервиса')
                            ->icon('pencil')
                            ->asyncParameters([
                                'service' => $service->id
                            ]),

                        Button::make(__('Delete'))
                            ->icon('trash')
                            ->confirm(__('Once the account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.'))
                            ->method('remove', [
                                'id' => $service->id,
                            ]),
                    ]))
                ->width('50px')->align(TD::ALIGN_RIGHT)->cantHide()
        ];
    }
}
