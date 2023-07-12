<?php
/*
 * ${PROJECT_NAME} | AwbListRequest.php
 * https://www.webdirect.ro/
 * Copyright 2023 Eugen Buiac
 * Email : office@webdirect.ro
 * Type  : PHP
 * Created on : 7/12/2023 9:14 AM
*/

namespace Modules\Tenants\Http\Requests\Awb;

use Illuminate\Foundation\Http\FormRequest;

class AwbListRequest extends FormRequest
{
    public function rules()
    {
        return [
            "Filter.max-page-filter" => "sometimes|integer|in:12,24,36",
            "page" => 'sometimes|numeric',
            'id_awb' => 'sometimes|numeric|exists:c_awb,id',
            'awb_number' => 'sometimes|string|exists:c_awb,awb_number',
        ];
    }
    public function messages()
    {
        return [
            'id_awb.exists' => 'Awb-ul nu există',
            'id_awb.numeric' => 'Id de awb nu este un numar',
            'awb_number.string' => 'Numarul de awb nu are formatul corect',
            'awb_number.exists' => 'Numarul de awb nu exista',
        ];
    }
}
