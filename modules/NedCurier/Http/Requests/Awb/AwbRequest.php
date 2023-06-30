<?php

namespace Modules\NedCurier\Http\Requests\Awb;

use Illuminate\Foundation\Http\FormRequest;

class AwbRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
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
