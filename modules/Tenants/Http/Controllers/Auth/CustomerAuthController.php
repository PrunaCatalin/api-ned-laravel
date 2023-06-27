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
use Illuminate\Support\Facades\URL;
use Modules\Tenants\Entities\Customer\Customer;
use Modules\Tenants\Http\Requests\CustomerLoginRequest;

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
       
    }

    public function logout(Request $request)
    {
        Auth::guard('customer')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();


        return redirect()->back();
    }

}

