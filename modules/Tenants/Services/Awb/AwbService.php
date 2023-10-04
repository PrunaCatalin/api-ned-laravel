<?php
/*
 * api-ned | AwbService.php
 * https://www.webdirect.ro/
 * Copyright 2023 Eugen Buiac
 * Email : office@webdirect.ro
 * Type  : PHP
 * Created on : 6/28/2023 3:38 PM
*/

namespace Modules\Tenants\Services\Awb;

use http\Env\Request;
use Modules\Tenants\Entities\Awb\CAwb;
use Modules\Tenants\Http\Requests\Awb\AwbListRequest;
use Modules\Tenants\Http\Requests\Awb\AwbRequest;

class AwbService
{
    /**
     * @param AwbListRequest $request
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getAwbList(AwbListRequest $request) {
        $perPage = 12;
        $page = 1;
        if ($request && $request->has('Filter.max-page-filter')) {
            $perPage = $request->input('Filter.max-page-filter');
        }
        if ($request && $request->get('page')) {
            $page = $request->get('page');
        }
        return CAwb::with([
            'details' , 'confirmation' , 'confirmationFiles' , 'statusHistory',
            'customer.details', 'receiver', 'sender'
        ])->whereHas('customer' , function($q) use ($request) {
            if($request->has('id_customer')) {
                $q->where("id" , $request->id_customer);
            }
        })->where(function($q) use ($request){
            if($request->has('id_awb')){
                $q->where("id" , $request->id_awb);
            }else if($request->has('awb_number')){
                $q->where("awb_number" , $request->awb_number);
            }
        })->orderBy('created_at', 'desc')
            ->paginate($perPage, '*', 'page', $page);
    }

    /**
     * @param AwbRequest $request
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|object|null
     */
    public function getAwb(AwbRequest $request) {
        return CAwb::with([
            'service', 'details', 'confirmation' , 'confirmationFiles' , 'statusHistory', 'customer',
            'sender',
            'sender.city',
            'sender.city.zones',
            'sender.county',
            'sender.address',
            'receiver',
            'receiver.county',
            'receiver.city',
            'receiver.city.zones',
            'receiver.address'
        ])->where(function($q) use ($request){
            if($request->has('id_awb')){
                $q->where("id" , $request->id_awb);
            }else if($request->has('awb_number')){
                $q->where("awb_number" , $request->awb_number);
            }
        })->first();
    }

    public function getServices(?Request $request) {
        return CAwb::with([
            'service'
        ])->get();
    }
}
