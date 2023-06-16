<?php

namespace Modules\FresciaStore\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class CustomerLoginRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|email|max: 255',
            'password' => 'required',
            'g-recaptcha-response' => 'required|recaptcha'
        ];
    }
    public function messages()
    {
        return [
            'g-recaptcha-response.recaptcha' => 'Captcha este invalida',
            'g-recaptcha-response.required' => 'Trebuie sa completezi captcha'
        ];
    }
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->redirectToIntended(route('customer.view.login'))
                ->withErrors($validator)
                ->withInput()
        );
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
