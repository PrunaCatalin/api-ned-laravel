<?php
/**
 * File Name: CustomerController.php
 * Author: CATALIN PRUNA
 * Created: 7/9/2023
 *
 * License:
 * --------------
 * SC WEBDIRECT TEHNOLOGIES SRL
 *
 * Change Log:
 * --------------
 * Date         | Author         | Description
 * 7/9/2023 | CATALIN PRUNA | Initial version
 *
 */

namespace Modules\Tenants\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Tenants\Entities\Customer\CustomerDetails;

class CustomerController extends Controller
{
    public function getDetails(){
        $details = CustomerDetails::with([
            'accountType',
            'accountStatus',
            'company'
        ])
        ->where("id_customer" , auth('sanctum')->user()->id)->first();
        return response()->json([
            'status' => true,
            'user' => $details,
            'company' => $details->company,
        ]);
    }
}
