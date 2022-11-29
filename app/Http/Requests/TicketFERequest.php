<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TicketFERequest extends FormRequest
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
            'last_name' => 'required',
            'first_name' => 'required',
            'patronymic' => 'nullable',
            'organisation' => 'nullable',
            'ls' => 'digits:10|nullable',
            'address' => 'required',
            'phone' => 'phone:RU|required',
            'email' => 'email:rfc,dns|required',
            'title' => 'required',
            'message' => 'required',
            'personal-date' => 'accepted',
            'agree-rule' => 'accepted',
        ];
    }
}
