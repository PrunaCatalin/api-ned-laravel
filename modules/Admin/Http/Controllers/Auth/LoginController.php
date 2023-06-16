<?php

namespace Modules\Admin\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\ApplicationLinks\WdApplicationLinks;
use App\Models\Users\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\URL;
use Modules\Admin\Http\Requests\LoginRequest;

class LoginController extends Controller
{
    //
    /*
   |--------------------------------------------------------------------------
   | Login Controller
   |--------------------------------------------------------------------------
   |
   | This controller handles authenticating users for the application and
   | redirecting them to your home screen. The controller uses a trait
   | to conveniently provide its functionality to your applications.
   |
   */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Exception
     */
    public function login(LoginRequest $request)
    {

        if (
            Auth::guard('web')->attempt(
                ['email' => $request->email, 'password' => $request->password],
                $request->remember
            )
        ) {
            $request->session()->regenerate();
            //redirect back or fallback to shop.page
            $url = URL::previous();
            if ($url == route('admin.view.login')) {
                return redirect(route('admin.view.dashboard'));
            }
            return redirect(route('admin.view.dashboard'));
        }
        return back()->withErrors([
            'login' => 'Incorrect Credentials!',
        ]);
    }
    public function viewLoginPage()
    {
        if (!Auth::guard('web')->check()) {
            return view('admin::layouts.login');
        }
        return redirect(route('admin.view.profile'));
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->back();
    }
}
