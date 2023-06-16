<?php

namespace modules\Admin\Http\Requests\Acl;

use Illuminate\Foundation\Http\FormRequest;

class AclRolesRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if ($this->wantsJson()) {
            return [
                'Role.id' => 'sometimes|int',
                'Role.action' => 'sometimes|in:add,edit,clone',
                'Role.name' => 'sometimes|nullable|string|min:3',
                'Role.description' => 'sometimes|nullable|string|min:3',
                'Role.clone' => 'sometimes|in:yes',
                'Role.cloneId' => 'sometimes|int',
                'Role.Permission.id' => 'sometimes|int',
                'max_page' => 'sometimes|int',
                'page' => 'sometimes|int',
            ];
        } else {
            return [];
        }
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
