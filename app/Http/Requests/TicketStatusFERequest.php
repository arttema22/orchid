<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TicketStatusFERequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Подготовить данные для валидации.
     * Убираем из поля phone все лишние символы.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        $this->merge([
            'phone' => preg_replace("/[^0-9]/", '', $this->phone),
        ]);
    }

    /**
     * Правила валидации.
     * Значение поля phone должно соответствовать значению из поля code
     * Это реализовано в кастомном правиле Rule
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'code' => 'required|exists:tickets',
            'phone' => [
                'required',
                Rule::exists('tickets')
                    ->where('code', $this->code),
            ],
        ];
    }
}
