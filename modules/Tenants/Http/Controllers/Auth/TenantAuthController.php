<?php
/*
 * api-ned | CustomerAuthController.php
 * https://www.webdirect.ro/
 * Copyright 2023 Eugen Buiac
 * Email : office@webdirect.ro
 * Type  : PHP
 * Created on : 6/16/2023 3:44 PM
*/

namespace Modules\Tenants\Http\Controllers\Auth;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL;
use Modules\Tenants\Entities\Customer\CustomerAccount;
use Modules\Tenants\Entities\Customer\Customer;
use Modules\Tenants\Http\Requests\TenantLoginRequest;

class TenantAuthController extends Controller
{

    public function login(TenantLoginRequest $request)
    {
        $user = CustomerAccount::with(['audits'])->where('email', $request->email)->first();

        if (!$user) {
            return response()->json([
                'status' => false,
                'errors' => ['email' => 'Email not found']
            ]);
        } else {
            $user->nameLetters = "N/A";
            if (preg_match_all("/(?<=\s|^)\w/iu", ucwords(strtolower($user->name)), $matches)) {
                $user->nameLetters = implode("", $matches[0]);
            }
            if (Hash::check($request->password, $user->password)) {
                $user->tokens()->where('tokenable_id', $user->id)->delete(); // cleanup old tokens
                $user->token = $user->createAuthToken('WD-Auth')->plainTextToken;
                return response()->json([
                    'status' => true,
                    'message' =>"Login Success",
                    "user" => $user
                ]);
            }else{
                return response()->json([
                    'status' => false,
                    'errors' => ['password' => "User password is wrong"]
                ]);
            }
        }

    }

    public function logout()
    {
        Auth::guard('sanctum')->logout();
        return response()->json([
            'status' => true,
            'message' =>"Logout Success"
        ]);
    }

}

