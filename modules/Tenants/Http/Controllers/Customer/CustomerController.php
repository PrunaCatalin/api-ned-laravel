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
use Modules\Tenants\Entities\Awb\CAwbReceiver;
use Modules\Tenants\Entities\Awb\CAwbSender;
use Modules\Tenants\Entities\Customer\CustomerDetails;
use Modules\Tenants\Entities\Price\TablePriceContractCustom;

class CustomerController extends Controller
{
    public function getDetails(){
        $details = CustomerDetails::with([
            'accountType',
            'accountStatus',
            'company',
            'country',
            'county',
            'city'
        ])
        ->where("id_customer" , auth('sanctum')->user()->id)->first();
        return response()->json([
            'status' => true,
            'user' => $details,
            'company' => $details->company,
        ]);
    }

    public function getSenderList() {
        $senders = CAwbSender::with(['sender', 'county', 'city'])
            ->where("id_customer", auth('sanctum')->user()->id)
            ->get();

        return response()->json([
            'status' => true,
            'senders' => $senders,
        ]);
    }

    public function getReceiverList() {
        $receivers = CAwbReceiver::with(['receiver', 'county', 'city'])
            ->where("id_customer", auth('sanctum')->user()->id)
            ->get();

        return response()->json([
            'status' => true,
            'receivers' => $receivers,
        ]);
    }

    public function getPriceList() {
        $priceList = TablePriceContractCustom::with(['price'])
            ->where("id_customer", auth('sanctum')->user()->id)
            ->get();

        return response()->json([
            'status' => true,
            'price' => $priceList,
        ]);
    }
}
