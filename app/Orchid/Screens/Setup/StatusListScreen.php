<?php

namespace App\Orchid\Screens\Setup;

use App\Http\Requests\StatusRequest;
use Orchid\Screen\Screen;
use App\Models\Status;
use App\Orchid\Layouts\Setup\CreateUpdateStatus;
use App\Orchid\Layouts\Setup\StatusListTable;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Modal;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class StatusListScreen extends Screen
{
    public $name = 'Статусы';

    public $description = 'Список статусов';

    public $permission = 'setup.status';

    /**
     * Query data.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'statuses' => Status::filters()->defaultSort('id', 'ASC')->paginate(10)
        ];
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            // ModalToggle::make('Новый')
            //     ->modal('createStatus')
            //     ->method('createOrUpdateStatus')
            //     ->class('btn btn-success')
            //     ->icon('plus'),
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
            StatusListTable::class,

            Layout::modal('createStatus', CreateUpdateStatus::class)->title('Новый статус')->applyButton('Создать'),

            Layout::modal('editStatus', CreateUpdateStatus::class)->async('asyncGetData'),
        ];
    }

    public function asyncGetData(Status $status)
    {
        return ['status' => $status];
    }

    public function createOrUpdateStatus(StatusRequest $request)
    {
        $statusId = $request->input('status.id');
        Status::updateOrCreate(
            ['id' => $statusId],
            $request->validated()['status']
        );
        is_null($statusId) ? Toast::info('Создан новый статус') : Toast::info('Статус изменен');
    }
}
