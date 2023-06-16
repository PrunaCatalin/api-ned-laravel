<?php

namespace Modules\Admin\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Users\User;
use App\Services\User\UserServices;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Modules\Admin\Http\Requests\AccountDetailsRequest;
use Modules\Admin\Http\Requests\UserPasswordRequest;

class UserController extends Controller
{
    //
    /**
     * @param Request $request
     * @return Authenticatable|null Information from database
     */
    public function userInformation(Request $request): ?Authenticatable
    {
        return auth('sanctum')->user();
    }

    /**
     * @param UserPasswordRequest $request
     * @return JsonResponse
     */
    public function resetPassword(UserPasswordRequest $request): JsonResponse
    {
        $services = new UserServices();
        try {
            $message = $services->resetPassword($request);
        } catch (\Exception $ex) {
            return response()->json(["success" => false, "message" => $ex->getMessage()]);
        }
        return response()->json($message);
    }


    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function userList(Request $request): JsonResponse
    {

        $users = User::with(['tenant'])->where(function ($q) use ($request) {
            if ($request->post("User") && !empty($request->post("User")['name'])) {
                $q->where("name", "like", "%" . $request->post("User")['name'] . "%");
            }
            if ($request->post("User") && !empty($request->post("User")['email'])) {
                $q->where("email", $request->post("User")['email']);
            }
        })->paginate($request->post("max_page"), ["*"], "users", $request->post("page"));

        return response()->json(["status" => true , "Users" => $users->toArray()]);
    }

    /**
     * @return JsonResponse
     */
    public function userDetails(): JsonResponse
    {
        $user = User::with(['userDetails'])->find(auth('sanctum')->user()->id);
        if ($user) {
            return response()->json(["success" => true , "details" => $user->toArray()]);
        }
        return response()->json(["success" => false , "details" => null]);
    }

    /**
     * @return JsonResponse
     */
    public function saveUserDetails(AccountDetailsRequest $request): JsonResponse
    {
        $user = auth('sanctum')->user()->id ?? $request->user_id;
        $message = [ "message" => "" , "success" => false];
        try {
            $userService = new UserServices();
            $message = $userService->updateUserDetails($request, $user);
        } catch (\Exception $ex) {
            return response()->json(["success" => false, "message" => $ex->getMessage()]);
        }
        return response()->json(["success" => $message['success'] , "message" => $message['message']]);
    }


    public function isAuthenticated(Request $request) {
        $header = $request->header('Authorization');
        $response = ["success" => false , "message" => ""];

        $response['success'] = false;
        $response['header'] = $header;
        $response['message'] = "Auth Successfully";

        return response()->json($response);
    }
}
