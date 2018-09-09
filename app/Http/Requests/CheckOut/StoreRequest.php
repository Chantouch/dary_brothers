<?php

namespace App\Http\Requests\CheckOut;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'address' => 'required|string|min:5',
            'first_name' => 'required|string|min:3',
            'last_name' => 'required|string|min:3',
            'email' => 'required|email|min:4',
            'phone_number' => 'required',
            'payment_method' => 'required|integer|in:1,2',
            'date_of_birth' => 'nullable|date'
        ];
    }
}
