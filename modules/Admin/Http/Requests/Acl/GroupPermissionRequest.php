<?php

namespace Modules\Admin\Http\Requests\Acl;

use Illuminate\Foundation\Http\FormRequest;

class GroupPermissionRequest extends FormRequest
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
        if ($this->wantsJson()) {
            return [
                'moduleName' => 'required|string|min:3',
                'groupId' => 'required|int',
                'operationId' => 'required|int',
                'tenantId' => 'required|int',
                'maxPage' => 'required|int',
                'page' => 'required|int',
            ];
        } else {
            return [];
        }
    }
    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'moduleName' => 'Module is required',
            'groupId' => 'Group is required',
            'operationId' => 'Operation is required',
            'tenantId' => 'Tenant is required',
            'maxPage' => 'MaxPage is required',
            'page' => 'Page is required',
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        // use trans instead on Lang
        return [
            'moduleName.required' => 'Module is required',
            'moduleName.min' => 'Module name need to be more than 3 characters',
            'groupId.required' => 'Group Id is mandatory',
            'operationId.required' => 'Operation Id is mandatory',
            'tenantId.required' => 'Client Id is mandatory',
            'maxPage.required' => 'Max page is required',
            'page.required' => 'Page is required',
        ];
    }
}
