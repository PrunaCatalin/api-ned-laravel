<?php

namespace Modules\NedCurier\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AboutUsRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'text_app' => 'required|int'
        ];
    }
    public function messages()
    {
        return [
            'text_app.required' => 'Textul este obligatoriu',
            'text_app.integer' => 'Textul este numar'
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
