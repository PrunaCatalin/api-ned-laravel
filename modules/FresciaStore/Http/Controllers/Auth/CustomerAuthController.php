<?php

namespace Modules\FresciaStore\Http\Controllers\Auth;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Modules\FresciaStore\Entities\Customer\Customer;
use Modules\FresciaStore\Http\Requests\CustomerLoginRequest;

class CustomerAuthController extends Controller
{
    /**
     * Show the specified resource.
     * @param int $id
     */
    public function view()
    {
//        dd(Auth::user());
        if (!Auth::guard('customer')->check()) {
            return view('fresciastore::auth.login');
        }
        return redirect(route('customer.view.profile'));
    }

    public function login(CustomerLoginRequest $request)
    {
//        dd($request->all());
        if (Auth::guard('customer')->attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();
            //redirect back or fallback to shop.page
            $url = URL::previous();
            if ($url == route('customer.view.login')) {
                return redirect(route('shop.page'));
            }
            return redirect()->back();

        }
        return back()->withErrors([
            'login' => 'Datele de logare sunt incorecte!',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::guard('customer')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();


        return redirect()->back();
    }

}
