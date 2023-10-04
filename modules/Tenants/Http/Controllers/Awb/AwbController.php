<?php
/*
 * ${PROJECT_NAME} | AwbController.php
 * https://www.webdirect.ro/
 * Copyright 2023 Eugen Buiac
 * Email : office@webdirect.ro
 * Type  : PHP
 * Created on : 7/12/2023 9:12 AM
*/

namespace Modules\Tenants\Http\Controllers\Awb;

use App\Http\Controllers\Controller;
use Modules\Tenants\Entities\Awb\CAwb;
use Modules\Tenants\Entities\Transaction\TransactionService;
use Modules\Tenants\Http\Controllers\Location\LocationController;
use Modules\Tenants\Http\Requests\Awb\AwbActionRequest;
use Modules\Tenants\Http\Requests\Awb\AwbListRequest;
use Modules\Tenants\Http\Requests\Awb\AwbRequest;
use Modules\Tenants\Services\Awb\AwbService;

class AwbController extends Controller
{
    /**
     * @param AwbListRequest|null $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAwbList(?AwbListRequest $request)
    {
        $request->id_customer = auth('sanctum')->user()->id;
        $awbList = (new AwbService())->getAwbList($request);
        return response()->json([
            'status' => true,
            'message' => "Success",
            "list" => $awbList
        ]);
    }

    /**
     * @param AwbRequest|null $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAwb(?AwbRequest $request)
    {
        $request->id_customer = auth('sanctum')->user()->id;
        $awb = (new AwbService())->getAwb($request);
        return response()->json([
            'status' => true,
            'message' => "Success",
            "listAwb" => $awb
        ]);
    }


    public function editAwb(?AwbRequest $request)
    {
        $request->id_customer = auth('sanctum')->user()->id;
        $awb = (new AwbService())->getAwb($request);
        return response()->json([
            'status' => true,
            'message' => "Success",
            "listAwb" => $awb,
        ]);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getServices () {
        $allServices = TransactionService::all();
        return response()->json([
            'status' => true,
            'message' => "Success",
            "listServices" => $allServices,
        ]);
    }

//    public function update(?AwbActionRequest $request) {
//        if ($request->validated()) {
//
//            $awb = CAwb::with([])->where(function($q) use ($request){
//                if($request->has('id_awb')){
//                    $q->where("id" , $request->id_awb);
//                }else if($request->has('awb_number')){
//                    $q->where("awb_number" , $request->awb_number);
//                }
//            })->first();
//
//            $awbModel = $awb->update([
//                "id_customer" => $request->id_customer,
//                "id_sender" => $request->id_sender,
//                "id_receiver" => $request->id_receiver,
//                "id_county_sender" => $request->id_county_sender,
//                "id_city_sender" => $request->id_city_sender,
//                "id_county_receiver" => $request->id_county_receiver,
//                "id_city_receiver" => $request->id_city_receiver,
//                "id_service" => $request->id_service,
//                "id_status" => $request->id_status,
//                "wb_number" => $request->wb_number,
//                "awb_number_confirmation" => $request->awb_number_confirmation,
//                "ts_create" => $request->ts_create,
//                "ts_update" => $request->ts_update,
//                "ts_received" => $request->ts_received,
//                "need_confirmation" => $request->need_confirmation,
//                "updated_at" => $request->updated_at,
//                "created_at" => $request->created_at
//            ]);
//
//            if ($awbModel) {
//
//                return response()->json([
//                    'status' => true,
//                    'message' => "Success",
//                    "Request" => $request->all(),
//                    "id_customer" => auth('sanctum')->user()->id,
//                    "requestPost" => $request->post(),
//                    "awb" => $awb
//                ]);
//            }
//
//
//        }
//    }

    public function update(?AwbActionRequest $request) {
        if ($request->validated()) {
            $awbQuery = CAwb::query();

            if ($request->has('id_awb')) {
                $awbQuery->where("id", $request->id_awb);
            } elseif ($request->has('awb_number')) {
                $awbQuery->where("awb_number", $request->awb_number);
            }

            $awb = $awbQuery->first();

            if ($awb) {
                $awbData = $request->only([
                    "id_customer", "id_sender", "id_receiver", "id_county_sender", "id_city_sender",
                    "id_county_receiver", "id_city_receiver", "id_service", "id_status", "wb_number",
                    "awb_number_confirmation", "ts_create", "ts_update", "ts_received", "need_confirmation",
                    "updated_at", "created_at"
                ]);

                $awb->update($awbData);

                return response()->json([
                    'status' => true,
                    'message' => "Success",
                    "Request" => $request->all(),
                    "id_customer" => auth('sanctum')->user()->id,
                    "requestPost" => $request->post(),
                    "awb" => $awb
                ]);
            }
        }
    }


}
