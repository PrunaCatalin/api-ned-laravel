<?php

namespace Modules\FresciaStore\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class CookieController extends Controller
{
    public function acceptCookies(Request $request)
    {
        return response()->json([
            'message'=>'Cookie set'
        ])->cookie('accept_cookies', 'true', 60 * 24 * 365); // Valabil 1 an

    }
}
