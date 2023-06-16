<?php

namespace Modules\Admin\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Mail\SendMailResetPassword;
use App\Models\Users\RecoverPasswordUser;
use App\Models\Users\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Modules\Admin\Http\Requests\ForgotPasswordRequest;
use Symfony\Component\HttpFoundation\Response;

class ForgotPasswordController extends Controller
{
    //
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function sendPasswordResetEmail(ForgotPasswordRequest $request)
    {
        // If email does not exist

        $user = $this->validEmail($request->email);
        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Email does not exist.'
            ], Response::HTTP_NOT_FOUND);
        } else {
            // If email exists
            $this->sendMail($user);
            return response()->json([
                'success' => true,
                'message' => 'Check your inbox, we have sent a link to reset email.'
            ], Response::HTTP_OK);
        }
    }

    /**
     * @param $email
     * @return void
     */
    public function sendMail(User $user)
    {
        $token = $this->generateToken($user->id);
        Mail::to($user->email)->send(new SendMailResetPassword($token));
    }

    /**
     * @param $email
     * @return bool
     */
    public function validEmail($email): User
    {
        return User::where('email', $email)->first();
    }

    /**
     * @param $email
     * @return string
     */
    public function generateToken(int $user_id)
    {

        $isOtherToken = RecoverPasswordUser::where('user_id', $user_id)->first();
        if ($isOtherToken) {
            return $isOtherToken->token;
        }
        $token = Str::random(80);
        $this->storeToken($token, $user_id);
        return $token;
    }

    /**
     * @param $token
     * @param $email
     * @return void
     */
    public function storeToken(string $token, int $user_id)
    {
        RecoverPasswordUser::create([
            'user_id' => $user_id,
            'token' => $token,
            'expired_at' => Carbon::now()->addHours(env("GENERATE_PASSWORD_EXPIRED"))
        ]);
    }
}
