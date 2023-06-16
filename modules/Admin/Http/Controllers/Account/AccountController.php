<?php

namespace modules\Admin\Http\Controllers\Account;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Admin\Http\Requests\AccountRequest;
use Modules\FresciaStore\Entities\Location\GenericCountries;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function account()
    {
        $account = Auth::guard('web')->user();
        $countries = GenericCountries::all()->toArray();
        return view('admin::pages.account', compact('account', 'countries'));
    }


    /**
     * Update the specified resource in storage.
     * @param AccountRequest $request
     * @return Renderable
     */
    public function savePersonalInformation(AccountRequest $request)
    {
        //
        dd($request->all());

    }

}
