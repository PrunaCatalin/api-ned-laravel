<?php
/*
 * ${PROJECT_NAME} | AwbActionRequest.php
 * https://www.webdirect.ro/
 * Copyright 2023 Eugen Buiac
 * Email : office@webdirect.ro
 * Type  : PHP
 * Created on : 9/18/2023 12:44 PM
*/

namespace Modules\Tenants\Http\Requests\Awb;

use Illuminate\Foundation\Http\FormRequest;

class AwbActionRequest extends FormRequest
{
    /**
     * @return string[]
     */
    public function rules()
    {
        return [
            'id_awb' => 'required|numeric|exists:c_awb,id',
            'awb_number' => 'required|string|exists:c_awb,awb_number',
            'sender_list' => 'required|numeric',
            'sender_name' => 'required|string|max:255',
            'id_county' => 'required|numeric',
            'sender_city' => 'required|string|max:255',
            'sender_street' => 'required|string|max:255',
            'sender_building' => 'required|string|max:255',
            'sender_postal_code' => 'required|string|max:255',
            'sender_contact' => 'required|string|max:255',
            'sender_phone' => 'required|string|max:255',
            'sender_email' => 'required|email|max:255',
            'receiver_list' => 'required|numeric',
            'receiver_name' => 'required|string|max:255',
            'receiver_city' => 'required|string|max:255',
            'receiver_street' => 'required|string|max:255',
            'receiver_building' => 'required|string|max:255',
            'receiver_postal_code' => 'required|string|max:255',
            'receiver_contact' => 'required|string|max:255',
            'receiver_phone' => 'required|string|max:255',
            'receiver_email' => 'required|email|max:255',
            'id_service' => 'required|numeric|max:255',
            'packages' => 'required|numeric',
            'envelopes' => 'required|numeric',
            'weight' => 'required|numeric',
            'height' => 'required|numeric',
            'width' => 'required|numeric',
            'length' => 'required|numeric',
            'val_declared' => 'sometimes|numeric',
            'refund_cash' => 'sometimes|numeric',
            'refund_bank' => 'sometimes|numeric',
            'shipmentPayer' => 'sometimes|numeric',
            'refund_bo' => 'sometimes|numeric',
            'amount' => 'sometimes|numeric',
            'only_generate' => 'sometimes|string',
        ];
    }

    /**
     * @return string[]
     */
    public function messages()
    {
        return [
            'awb_number.required' => 'Campul numar AWB este obligatoriu.',
            'awb_number.string' => 'Campul numar AWB trebuie să fie de tip text.',
            'awb_number.max' => 'Campul numar AWB nu poate depasi :max caractere.',
            'id_awb.required' => 'Campul ID AWB este obligatoriu.',
            'id_awb.numeric' => 'Campul ID AWB trebuie sa fie numeric.'
        ];
    }


    public function authorize(): bool
    {
        return true;
    }
}
