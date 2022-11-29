<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'order.service_id' => 'exists:App\Models\Service,id|required',
            'order.last_name' => 'required',
            'order.first_name' => 'required',
            'order.patronymic' => 'nullable',
            'order.organisation' => 'nullable',
            'order.address' => 'required',
            'order.phone' => 'phone:RU|required',
            'order.email' => 'email|required',
            'order.message' => 'nullable',
        ];
    }
}
