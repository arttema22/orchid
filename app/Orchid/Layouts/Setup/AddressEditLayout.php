<?php

namespace App\Orchid\Layouts\Setup;

use Orchid\Screen\Field;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Rows;

class AddressEditLayout extends Rows
{
    /**
     * Views.
     *
     * @return Field[]
     */
    public function fields(): array
    {
        return [
            Input::make('settings.mail-ticket')
                ->type('email')
                ->required()
                ->title('Email получателя обращения'),

            Input::make('settings.mail-order')
                ->type('email')
                ->required()
                ->title('Email получателя запросов'),

            Input::make('settings.mail-control')
                ->type('email')
                ->required()
                ->title('Email контролирующего'),
        ];
    }
}
