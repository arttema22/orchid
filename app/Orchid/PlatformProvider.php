<?php

declare(strict_types=1);

namespace App\Orchid;

use App\Models\Order;
use App\Models\Ticket;
use Orchid\Platform\Dashboard;
use Orchid\Platform\ItemPermission;
use Orchid\Platform\OrchidServiceProvider;
use Orchid\Screen\Actions\Menu;
use Orchid\Support\Color;

class PlatformProvider extends OrchidServiceProvider
{
    /**
     * @param Dashboard $dashboard
     */
    public function boot(Dashboard $dashboard): void
    {
        parent::boot($dashboard);

        // ...
    }

    /**
     * @return Menu[]
     */
    public function registerMainMenu(): array
    {
        return [
            Menu::make('Обращения')
                ->route('ticket.list')
                ->permission('ticket.list')
                ->icon('note')
                ->badge(function () {
                    $new = Ticket::where('status_id', 1)->count();
                    if ($new > 0) return $new;
                }, Color::WARNING()),

            Menu::make('Запросы на услуги')
                ->route('order.list')
                ->permission('order.list')
                ->icon('social-dropbox')
                ->badge(function () {
                    $new = Order::where('status_id', 1)->count();
                    if ($new > 0) return $new;
                }, Color::WARNING())
                ->divider(),

            Menu::make('Настройки')
                ->permission('setup')
                ->icon('settings')
                ->list([
                    Menu::make('Статусы')
                        ->route('setup.statuses')
                        ->permission('setup.status')
                        ->icon('list'),
                    Menu::make('Услуги')
                        ->route('setup.services')
                        ->permission('setup.service')
                        ->icon('list'),
                    Menu::make('Настройки')
                        ->icon('phone')
                        ->route('setup'),
                    // ->permission('platform.systems.roles'),

                    Menu::make(__('Users'))
                        ->icon('user')
                        ->route('platform.systems.users')
                        ->permission('platform.systems.users')
                        ->title(__('Access rights')),
                    Menu::make(__('Roles'))
                        ->icon('lock')
                        ->route('platform.systems.roles')
                        ->permission('platform.systems.roles'),
                ]),
        ];
    }

    /**
     * @return Menu[]
     */
    public function registerProfileMenu(): array
    {
        return [
            Menu::make('Profile')
                ->route('platform.profile')
                ->icon('user'),
        ];
    }

    /**
     * @return ItemPermission[]
     */
    public function registerPermissions(): array
    {
        return [
            ItemPermission::group('Обращения')
                ->addPermission('ticket.list', 'Работа с обращениями'),

            ItemPermission::group('Запросы')
                ->addPermission('order.list', 'Работа с запросами'),

            ItemPermission::group('Настройки')
                ->addPermission('setup', 'Управление настройками')
                ->addPermission('setup.status', 'Статусы')
                ->addPermission('setup.service', 'Услуги'),

            ItemPermission::group(__('System'))
                ->addPermission('platform.systems.roles', __('Roles'))
                ->addPermission('platform.systems.users', __('Users')),
        ];
    }
}
