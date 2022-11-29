<?php

namespace App\Orchid\Screens\Order;

use App\Http\Requests\OrderRequest;
use App\Models\Order;
use Orchid\Screen\Screen;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Support\Facades\Layout;
use App\Orchid\Layouts\Charts\DynamicDayData;
use App\Orchid\Layouts\Order\OrderListTable;
use App\Orchid\Layouts\Order\CreateUpdateOrder;
use App\Orchid\Layouts\Order\OrderFiltersLayout;
use Orchid\Support\Facades\Toast;

class OrderListScreen extends Screen
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
                Order::where('status_id', 1)
                    ->countByDays(startDate: null, stopDate: null, dateColumn: 'created_at')
                    ->toChart('Новые'),
                Order::where('status_id', 2)
                    ->countByDays(startDate: null, stopDate: null, dateColumn: 'created_at')
                    ->toChart('В работе'),
                Order::where('status_id', 3)
                    ->countByDays(startDate: null, stopDate: null, dateColumn: 'created_at')
                    ->toChart('Закрытые'),
            ],

            'order' => Order::filters()
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
        return 'Запросы на услуги';
    }

    /**
     * Display description name.
     *
     * @return string|null
     */
    public function description(): ?string
    {
        return 'Список запросов на оказание дополнительных услуг';
    }

    public $permission = 'order.list';

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            ModalToggle::make('Новый')
                ->modal('createOrder')
                ->method('createOrUpdateOrder')
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

            //OrderFiltersLayout::class,

            OrderListTable::class,

            Layout::modal(
                'createOrder',
                CreateUpdateOrder::class
            )->title('Новый запрос')
                ->applyButton('Сохранить'),

            Layout::modal(
                'editOrder',
                CreateUpdateOrder::class
            )->async('asyncGetOrder'),
        ];
    }

    public function asyncGetOrder(Order $order)
    {
        return ['order' => $order];
    }

    public function createOrUpdateOrder(OrderRequest $request)
    {
        $orderId = $request->input('order.id');
        Order::updateOrCreate(
            ['id' => $orderId],
            array_merge(
                $request->validated()['order'],
                [
                    'status_id' => 1
                ]
            )
        );
        is_null($orderId) ? Toast::info('Создан новый запрос') : Toast::info('Запрос обновлен');
    }
}
