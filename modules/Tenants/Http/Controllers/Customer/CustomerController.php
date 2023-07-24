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
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\Tenants\Entities\Awb\CAwbReceiver;
use Modules\Tenants\Entities\Awb\CAwbSender;
use Modules\Tenants\Entities\Customer\CustomerDetails;
use Modules\Tenants\Entities\Price\TablePriceContractCustom;

class CustomerController extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
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

    /**
     * @param Request|null $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getSenderList(?Request $request) {
        $perPage = 12;
        $page = 1;
        if ($request && $request->has('Filter.max-page-filter')) {
            $perPage = $request->input('Filter.max-page-filter');
        }
        if ($request && $request->get('page')) {
            $page = $request->get('page');
        }
        $senders = CAwbSender::with(['sender', 'county', 'city'])
            ->where("id_customer", auth('sanctum')->user()->id)
            ->paginate($perPage, '*', 'page', $page);

        return response()->json([
            'status' => true,
            'list' => $senders,
        ]);
    }

    /**
     * @param Request|null $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getReceiverList(?Request $request) {
        $perPage = 12;
        $page = 1;
        if ($request && $request->has('Filter.max-page-filter')) {
            $perPage = $request->input('Filter.max-page-filter');
        }
        if ($request && $request->get('page')) {
            $page = $request->get('page');
        }
        $receivers = CAwbReceiver::with(['receiver', 'county', 'city'])
            ->where("id_customer", auth('sanctum')->user()->id)
            ->paginate($perPage, '*', 'page', $page);

        return response()->json([
            'status' => true,
            'list' => $receivers,
        ]);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getPriceList() {
        $priceList = TablePriceContractCustom::with(['price'])
            ->where("id_customer", auth('sanctum')->user()->id)
            ->get();

        return response()->json([
            'status' => true,
            'price' => $priceList,
        ]);
    }

    /**
     * @param Request|null $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function Sender(?Request $request) {
        $sender = CAwbSender::with(['sender', 'county', 'city'])
            ->where(['id' => $request->id])->first();
        return response()->json([
            'status' => true,
            'sender' => $sender,
        ]);
    }

    public function editSender() {

    }
}
