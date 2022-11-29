<?php

namespace App\Orchid\Layouts\Setup;

use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;
use App\Models\Status;
use Orchid\Screen\Actions\ModalToggle;

class StatusListTable extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'statuses';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [
            TD::make('id', '№')->cantHide()->sort()->width('100px'),
            TD::make('name', 'Название')->cantHide(),
            TD::make('created_at', 'Дата создания')->defaultHidden(),
            TD::make('updated_at', 'Дата изменения')->defaultHidden()->popover('Дата, когда было внесено последнее изменение в названии статуса.'),
            TD::make('action', '')->render(
                function (Status $status) {
                    return ModalToggle::make()
                        ->modal('editStatus')
                        ->method('createOrUpdateStatus')
                        ->modalTitle('Редактирование статуса')
                        ->icon('pencil')
                        ->asyncParameters([
                            'status' => $status->id
                        ]);
                }
            )->width('50px')->align(TD::ALIGN_RIGHT)->cantHide()
        ];
    }
}
