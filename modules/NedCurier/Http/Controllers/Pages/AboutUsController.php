<?php

namespace Modules\NedCurier\Http\Controllers\Pages;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\NedCurier\Http\Requests\AboutUsRequest;

class AboutUsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index() // AboutUsRequest $request
    {
//        return view('nedcurier::pages.about-us' , compact('request'));
        return view('nedcurier::pages.about-us' );
    }

}
