<?php

namespace App\Http\Requests\Admin\Slider;

use Illuminate\Foundation\Http\FormRequest;

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
//            'title' => 'required|min:4|string',
//            'description' => 'required|min:10|string',
//            'text_link' => 'required|min:2|max:20|string',
            'link' => 'required|min:5|max:255|string',
            'type' => 'required|min:2|max:20|in:slider,banner,video'
        ];
    }
}
