<?php

namespace App\Orchid\Layouts\Answer;

use Orchid\Screen\Field;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Rows;
use Orchid\Screen\Fields\TextArea;

class AnswerEditLayout extends Rows
{
    /**
     * Views.
     *
     * @return Field[]
     */
    public function fields(): array
    {
        return [
            Input::make('draft.id')->type('hidden'),
            TextArea::make('draft.message')
                ->required()
                ->rows(10)
                ->title('Ответ'),
        ];
    }
}
