<?php

namespace App\Orchid\Screens\Setup;

use App\Http\Requests\ServiceRequest;
use Orchid\Screen\Screen;
use App\Models\Service;
use App\Orchid\Layouts\Setup\CreateUpdateService;
use App\Orchid\Layouts\Setup\ServiceListTable;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;
use Illuminate\Http\Request;

class ServiceListScreen extends Screen
{
    /**
     * Query data.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'services' => Service::filters()->defaultSort('name', 'ASC')->paginate(10)
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Услуги';
    }

    /**
     * Display description name.
     *
     * @return string|null
     */
    public function description(): ?string
    {
        return 'Список услуг';
    }

    public $permission = 'setup.service';

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            ModalToggle::make('Новая')
                ->modal('createService')
                ->method('createOrUpdateService')
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
            ServiceListTable::class,

            Layout::modal(
                'createService',
                CreateUpdateService::class
            )->title('Новая услуга')->applyButton('Создать'),

            Layout::modal(
                'editService',
                CreateUpdateService::class
            )->async('asyncGetData'),
        ];
    }

    public function asyncGetData(Service $service)
    {
        return ['service' => $service];
    }

    public function createOrUpdateService(ServiceRequest $request)
    {
        $serviceId = $request->input('service.id');
        Service::updateOrCreate(
            ['id' => $serviceId],
            $request->validated()['service']
        );
        is_null($serviceId) ? Toast::info('Создана новая услуга') : Toast::info('Услуга изменена');
    }

    /**
     * @param Request $request
     */
    public function remove(Request $request): void
    {
        Service::findOrFail($request->get('id'))->delete();
        Toast::info('Услуга была удалена');
    }
}
