
<?php
/*
 * api-ned | list-price.blade.php
 * https://www.webdirect.ro/
 * Copyright 2023 Eugen Buiac
 * Email : office@webdirect.ro
 * Type  : PHP
 * Created on : 6/29/2023 10:22 AM
*/
?>

@extends('nedcurier::layouts.master')
@section('content')
    <main id="main">

        <section class=" breadcumb" >
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 pt-lg-0 content">
                        <a href="{{ route('page.homepage') }}" ><span class="breadcumb-home">Home |</span></a> <span class="breadcumb-source">Lista Preturi</span>
                    </div>
                </div>
            </div>
        </section>

        <section id="page-content" class="page-content " >
            <div class="container">
                <div class="row">
                    <div class="col-lg-12  pt-lg-0 content">
                        <h2 class="page-content-title">Lista Lista Preturi</h2>
                        <p class="description page-content-global">
                            Lista Preturi
                        </p>

                        <img class="page-content-sign" src="{{ asset('modules/nedcurier/img/ned-sign.png') }}">
                    </div>
                </div>
            </div>
        </section>


    </main>
    <!-- End #main -->
@endsection

