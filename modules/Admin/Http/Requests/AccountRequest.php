<?php

namespace Modules\Admin\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Modules\Admin\Rules\DifferentFromCurrentPasswordRule;

class AccountRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'full_name' => 'required|max:255',
            'nif' => 'required|max:50',
            'full_address' => 'required|max:255',
            'phone' => 'required|max:20',
            'website' => 'nullable|url',
            'country' => 'required|exists:generic_countries,id',
            'current_password' => 'required_with:new_password|current_password',
            'new_password' => ['nullable', 'min:8', 'confirmed', new DifferentFromCurrentPasswordRule()],
            'confirm_password' => 'same:new_password',

        ];
    }

    public function messages()
    {
        return [
            'full_name.required' => trans('admin::rules.admin.full_name_required'),
            'full_name.max' => trans('admin::rules.admin.full_name_max'),

            'nif.required' => trans('admin::rules.admin.nif_required'),
            'nif.max' => trans('admin::rules.admin.nif_max'),

            'full_address.required' => trans('admin::rules.admin.full_address_required'),
            'full_address.max' => trans('admin::rules.admin.full_address_max'),

            'phone.required' => trans('admin::rules.admin.phone_required'),
            'phone.max' => trans('admin::rules.admin.phone_max'),

            'website.url' => trans('admin::rules.admin.website_url'),
            'website.max' => trans('admin::rules.admin.website_max'),

            'country.required' => trans('admin::rules.admin.country_required'),

            'current_password.required' => trans('admin::rules.admin.current_password_required'),
            'current_password.current_password' => trans('admin::rules.admin.current_password_current_password'),

            'new_password.required' => trans('admin::rules.admin.new_password_required'),
            'new_password.min' => trans('admin::rules.admin.new_password_min'),
            'new_password.different' => trans('admin::rules.admin.new_password_different'),

            'confirm_password.required' => trans('admin::rules.admin.confirm_password_required'),
            'confirm_password.same' => trans('admin::rules.admin.confirm_password_same')
        ];
    }
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->redirectToIntended(route('admin.view.account.settings'))
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
