<?php
/*
 * api-ned | shipment-tracking.blade.php
 * https://www.webdirect.ro/
 * Copyright 2023 Eugen Buiac
 * Email : office@webdirect.ro
 * Type  : PHP
 * Created on : 6/27/2023 4:15 PM
*/
?>

@extends('nedcurier::layouts.master')
@section('content')
    <main class="track-the-expedition-page " id="main">

        <section class=" breadcumb" >
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 pt-lg-0 content">
                        <a href="{{ route('page.homepage') }}"><span class="breadcumb-home">Home |</span></a> <span class="breadcumb-source">Urmăreste Expediția</span>
                    </div>
                </div>
            </div>
        </section>

        <section id="page-content" class="page-content track-the-expedition " >
            <div class="container">
                <div class="row">
                    <div class="col-lg-12  pt-lg-0 content">
                        <h2 class="track-the-expedition-title">Urmăreste Expediția</h2>

                        <form action="#" method="post" role="form" class="php-email-form">
                            <div class="row">
                                <div class="form-group track-the-expedition-input  col-md-3">
                                </div>
                                <div class="form-group track-the-expedition-input  col-md-6">
                                    <input placeholder="Introdu numarul de tracking (AWB)" type="text" name="name" class="form-control" id="name" required="">
                                    <div class="text-right">
                                        <a href="#" class="search-awb "> <img class="track-the-awb-button" src="{{ asset('modules/nedcurier/img/search-awb.png') }}"></a>
                                    </div>
                                </div>
                                <div class="form-group track-the-expedition-input  col-md-3">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <!-- ELEMENT DESIGN GLOB -->
        <div class="globe-awb-trak-image">
        </div>


    </main>
@endsection
