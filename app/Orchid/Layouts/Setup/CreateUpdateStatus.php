<?php

namespace App\Orchid\Layouts\Setup;

use Orchid\Screen\Field;
use Orchid\Screen\Layouts\Rows;
use Orchid\Screen\Fields\Input;

class CreateUpdateStatus extends Rows
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
            Input::make('status.id')->type('hidden'),
            Input::make('status.name')->required()->title('Название')
        ];
    }
}
