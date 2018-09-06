<?php

namespace App\Http\Requests\Admin\Product;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
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
            'images.*' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:20480',
            'en_name' => 'required|min:2|max:255|string',
            'price' => 'required|regex:/^\d*(\.\d{1,2})?$/',
            'cost' => 'required|regex:/^\d*(\.\d{1,2})?$/',
            'type_id' => [
                'required',
                Rule::exists('types', 'id')
            ],
            'qty' => 'required|numeric|min:1'
        ];
    }
}
