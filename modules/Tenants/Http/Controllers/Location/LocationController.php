<?php
/*
 * ${PROJECT_NAME} | LocationController.php
 * https://www.webdirect.ro/
 * Copyright 2023 Eugen Buiac
 * Email : office@webdirect.ro
 * Type  : PHP
 * Created on : 7/12/2023 9:10 AM
*/

namespace Modules\Tenants\Http\Controllers\Location;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Modules\Tenants\Entities\Location\GenericCity;
use Modules\Tenants\Entities\Location\GenericCounty;
use Modules\Tenants\Http\Requests\Location\GetCitiesRequest;
use Modules\Tenants\Http\Requests\Location\GetCountiesRequest;

class LocationController extends Controller
{
    /**
     * @param GetCountiesRequest $request
     * @return JsonResponse
     */
    public function getCounties(GetCountiesRequest $request)
    {
        $counties = GenericCounty::where(['id_country' => $request->id_country])->get();
		return response()->json([
            'status' => true,
            'counties' => $counties
        ]);
    }

    /**
     * @param GetCitiesRequest $request
     * @return JsonResponse
     */
    public function getCities(GetCitiesRequest $request)
    {
        $cities = GenericCity::with(['zones'])->where(['id_county' => $request->id_county])->get();
        return response()->json([
            'status' => true,
            'cities' => $cities
        ]);
    }
}
