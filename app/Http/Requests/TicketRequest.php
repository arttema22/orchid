<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TicketRequest extends FormRequest
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
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'ticket.last_name' => 'required',
            'ticket.first_name' => 'required',
            'ticket.patronymic' => 'nullable',
            'ticket.organisation' => 'nullable',
            'ticket.ls' => 'digits:10|nullable',
            'ticket.address' => 'required',
            'ticket.phone' => 'phone:RU|required',
            'ticket.email' => 'email|required',
            'ticket.title' => 'required',
            'ticket.message' => 'required',
        ];
    }
}
