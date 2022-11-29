<?php

namespace App\Orchid\Screens\Setup;

use Orchid\Screen\Screen;
use Spatie\Valuestore\Valuestore;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\Actions\Button;
use Orchid\Support\Color;
use App\Orchid\Layouts\User\UserEditLayout;
use App\Orchid\Layouts\Setup\AddressEditLayout;
use Symfony\Component\HttpFoundation\Request;

class SetupScreen extends Screen
{
    /**
     * Query data.
     *
     * @return array
     */
    public function query(): iterable
    {
        $settings = Valuestore::make(storage_path('app/settings.json'));
        return [
            'settings' => $settings->all(),
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Настройки';
    }

    /**
     * Display description name.
     *
     * @return string|null
     */
    public function description(): ?string
    {
        return 'Список основных настроек системы';
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [];
    }

    /**
     * Views.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {

        return [
            Layout::block(AddressEditLayout::class)
                ->title(__('Список адресов'))
                ->description('Список email адресов на которые отсылается письмо.')
                ->commands(
                    Button::make(__('Save'))
                        ->type(Color::DEFAULT())
                        ->icon('check')
                        //->canSee($this->user->exists)
                        ->method('save')
                ),

            // Layout::block(UserEditLayout::class)
            //     ->title(__('Контакы'))
            //     ->description('Почта, телефон для контакта.')
            //     ->commands(
            //         Button::make(__('Save'))
            //             ->type(Color::DEFAULT())
            //             ->icon('check')
            //             //->canSee($this->user->exists)
            //             ->method('save')
            //     ),

            // Layout::block(UserEditLayout::class)
            //     ->title(__('Profile Information'))
            //     ->description(__('Update your account\'s profile information and email address.'))
            //     ->commands(
            //         Button::make(__('Save'))
            //             ->type(Color::DEFAULT())
            //             ->icon('check')
            //             //->canSee($this->user->exists)
            //             ->method('save')
            //     ),
        ];
    }

    /**
     * @param User    $user
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function save(Request $request)
    {
        //dd($request);
        $settings = Valuestore::make(storage_path('app/settings.json'));

        $settings->put('mail-ticket', $request->get('settings.mail-ticket'));
        $settings->put('mail-order', $request->get('settings.mail-order'));
        $settings->put('mail-control', $request->get('settings.mail-control'));

        return redirect()->route('setup');
    }
}
