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
use Modules\Tenants\Http\Requests\Awb\AwbListRequest;
use Modules\Tenants\Services\Awb\AwbService;

class AwbController extends Controller
{
    public function getAwbList(?AwbListRequest $request)
    {
        $request->id_customer = auth('sanctum')->user()->id;
        $awbList = (new AwbService())->getAwbList($request);
        return response()->json([
            'status' => true,
            'message' =>"Success",
            "list" => $awbList
        ]);
    }
}
