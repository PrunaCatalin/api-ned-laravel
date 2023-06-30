<?php

namespace Modules\NedCurier\Http\Controllers\Pages\Awb;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\NedCurier\Http\Requests\Awb\AwbListRequest;
use Modules\NedCurier\Services\Awb\AwbService;

class ListAwbController extends Controller
{
    public function index(?AwbListRequest $request)
    {
//        return view('nedcurier::pages.about-us' , compact('request'));
        //->paginate($perPage, '*', 'page', $page);
//        $request->id_customer = Auth::guard('customer')->user()->id;
        $request->id_customer = 183;
        $awbList = (new AwbService())->getAwbList($request);

        return view('nedcurier::pages.list-awb' , compact('awbList'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('nedcurier::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('nedcurier::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
