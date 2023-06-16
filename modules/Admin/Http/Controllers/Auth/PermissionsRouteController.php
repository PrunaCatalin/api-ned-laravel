<?php

namespace Modules\Admin\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PermissionsRouteController extends Controller
{
    //
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function checkPermissionRoute(Request $request): JsonResponse
    {

        return response()->json(["hasPermission" => true , "auth" => auth('sanctum')->user()]);
    }
}
