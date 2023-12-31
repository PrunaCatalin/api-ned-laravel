<?php
/**
 * File Name: GetCountiesRequest.php
 * Author: CATALIN PRUNA
 * Created: 7/20/2023
 *
 * License:
 * --------------
 * SC WEBDIRECT TEHNOLOGIES SRL
 *
 * Change Log:
 * --------------
 * Date         | Author         | Description
 * 7/20/2023 | CATALIN PRUNA | Initial version
 *
 */

namespace Modules\Tenants\Http\Requests\Location;

use Illuminate\Foundation\Http\FormRequest;

class GetCountiesRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'id_country' => 'required|numeric'
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
