<?php
/*
 * api-ned | list-awb.blade.php
 * https://www.webdirect.ro/
 * Copyright 2023 Eugen Buiac
 * Email : office@webdirect.ro
 * Type  : PHP
 * Created on : 6/28/2023 10:34 AM
*/

?>

@extends('nedcurier::layouts.master')
@section('content')
    <main id="main">

        <section class=" breadcumb" >
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 pt-lg-0 content">
                        <a href="{{ route('page.homepage') }}" ><span class="breadcumb-home">Home |</span></a> <span class="breadcumb-source">List AWB</span>
                    </div>
                </div>
            </div>
        </section>

        <section id="page-content" class="page-content " >
            <div class="container">
                <div class="row">
                    <div class="col-lg-12  pt-lg-0 content">
                        <h2 class="page-content-title">List AWB</h2>

                        <form method="POST" action="{{ url()->full() }}" id="filterTable">
                            @csrf

                            <div class="col-md-12">
                                <div class="col-md-6">
                                    <input type="text" name="awb_number">
                                </div>
                            </div>

                        </form>


                        <table>
                            <thead>
                            <tr>
                                <th>AWB</th>
                                <th>Data Emiterii</th>
                                <th>Status Curent</th>
                                <th>Expeditor</th>
                                <th>Destinatar</th>
                                <th>Serviciu</th>
                                <th>Nr Colete</th>
                                <th>Plata</th>
                                <th>Data Livrare</th>
                                <th>Cost Exepditie</th>
                                <th>Actiuni</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($awbList as $awb)
                                <tr>
                                    <td>{{ $awb->awb_number}}</td>
                                    <td>{{ $awb->ts_create}}</td>
                                    <td>{{ $awb->id_status}}</td>
                                    <td></td>
                                    <td></td>
                                    <td>{{ $awb->id_service}}</td>
                                    <td>{{ $awb->details->shipmentPayer}}</td>
                                    <td>{{ $awb->details->packages}}</td>
                                    <td></td>
                                    <td>{{ $awb->details->amount}}</td>
                                    <td>
                                        <button class="btn btn-default" onclick="">view</button>
                                        <button class="btn btn-default" onclick="">Edit</button>
                                        <button class="btn btn-danger" onclick=""><i class="fa fa-trash"></i>Delete</button>
                                    </td>
                                </tr>
                            @endforeach
                            <!-- Adaugă mai multe rânduri pentru datele suplimentare din tabela employee_title -->
                            </tbody>
                        </table>


                        <div class="container pagination-wrapper">
                            {{ $awbList->links('nedcurier::components.pagination') }}
                        </div>
                        <img class="page-content-sign" src="{{ asset('modules/nedcurier/img/ned-sign.png') }}">
                    </div>
                </div>
            </div>
        </section>

    </main>
    <!-- End #main -->
@endsection
@section('scripts')
    <script src="{{ asset('modules/nedcurier/js/core/WDPagination.js') }}"></script>
@endsection

