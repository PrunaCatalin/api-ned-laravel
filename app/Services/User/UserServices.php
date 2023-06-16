<?php

/*
 * salesforce_laravel | UserServices.php
 * https://www.webdirect.ro/
 * Copyright 2022 Pruna Catalin Costin
 * Email : office@webdirect.ro
 * Type  : PHP
 * Created on : 10/10/2022 4:22 PM
*/

namespace App\Services\User;

use App\Models\Users\RecoverPasswordUser;
use App\Models\Users\User;
use Illuminate\Support\Facades\Hash;
use Modules\Admin\Http\Requests\AccountDetailsRequest;
use Modules\Admin\Http\Requests\UserPasswordRequest;

class UserServices
{
    /**
     * @throws \Exception
     * @return array
     */
    public function resetPassword(UserPasswordRequest $request): array
    {
        if ($request->validated()) {
            $isToken = RecoverPasswordUser::with(['user'])->where('token', $request->post("hash"))->first();
            if (!$isToken) {
                return ["success" => false, "message" => "Token not found"];
            }
            if (Hash::check($request->password, $isToken->user->password)) {
                return ["success" => false, "message" => "New password need to be different from the old one"];
            }
            $user = User::find($isToken->user_id);
            $user->password = Hash::make($request->password);
            if ($user->save()) {
                $isToken->delete(); // delete used token
                return ["success" => true, "message" => "Password was change successfully"];
            }
        }
        return $request->messages();
    }

    /**
     * @param AccountDetailsRequest $request
     * @param int $user_id
     * @return array
     */
    public function updateUserDetails(AccountDetailsRequest $request, int $user_id): array
    {
        $user = User::with(['userDetails'])->find($user_id);
        if ($request->validated()) {

            if ($request->post('old_password') && !Hash::check($request->old_password, $user->password)) {
                return ["success" => false, "message" => "Old password doesn't match"];
            }
            if ($request->post('new_password') && Hash::check($request->new_password, $user->password)) {
                return ["success" => false, "message" => "New password need to be different from the old one"];
            }
            if ($request->post('new_password')) {
                $user->update([
                    "password" => Hash::make($request->password)
                ]);
            }

            $userModel = $user->update([
                "name" => $request->name
            ]);
            $userDetailsModel = $user->userDetails()->update([
                "address" => $request->user_details['address'],
                "phone" => $request->user_details['phone'],
                "date_of_birth" => $request->user_details['date_of_birth'],
            ]);
            if ($userModel || $userDetailsModel) {
                return ["success" => true, "message" => "Details was change successfully"];
            }
            return ["success" => true, "message" => "No changes made"];
        }
        return $request->messages();
    }
}
