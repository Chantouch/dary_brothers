<?php

namespace App\Http\Requests\Frontend\Contact;

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
            'name' => 'required|min:3|max:255|string',
            'phone' => 'required|digits_between:9,15|numeric',
            'email' => 'required|min:5|max:255|email',
            'message' => 'required|min:5|string',
            'subject' => 'required|in:Contact,Feedback,Request'
        ];
    }
}
