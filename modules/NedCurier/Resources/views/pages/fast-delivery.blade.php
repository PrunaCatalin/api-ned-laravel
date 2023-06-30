<?php
/*
 * api-ned | fast-delivery.blade.php
 * https://www.webdirect.ro/
 * Copyright 2023 Eugen Buiac
 * Email : office@webdirect.ro
 * Type  : PHP
 * Created on : 6/27/2023 8:41 PM
*/
?>


@extends('nedcurier::layouts.master')
@section('content')
    <main id="main">

        <section class=" breadcumb" >
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 pt-lg-0 content">
                        <a href="{{ route('page.homepage') }}" ><span class="breadcumb-home">Home |</span></a> <span class="breadcumb-source">Fast Delivery</span>
                    </div>
                </div>
            </div>
        </section>

        <section id="page-content" class="page-content " >
            <div class="container">
                <div class="row">
                    <div class="col-lg-12  pt-lg-0 content">
                        <h2 class="page-content-title">Fast Delivery</h2>
                        <p class="description page-content-global">
                            Caracteristicile și avantajele curieratului rapid includ:
                            <br><br>
                            Viteză de livrare: Coletele sunt livrate într-un timp foarte scurt, de obicei în câteva zile sau chiar mai puțin, în funcție de destinație.
                            <br><br>
                            Urmărire: Prin intermediul unor sisteme de urmărire, clienții pot monitoriza starea și locația coletelor lor pe tot parcursul transportului.
                            <br><br>
                            Siguranță: Companiile de curierat rapid oferă asigurări pentru coletele transportate, protejând astfel clienții împotriva pierderilor sau deteriorărilor.
                            <br><br>
                            Flexibilitate: Există opțiuni de servicii variate, cum ar fi livrare de urgență, livrare la domiciliu, livrare în weekend sau în afara orelor normale de lucru.
                            <br><br>
                            Asistență vamală: Companiile de curierat rapid oferă adesea servicii de asistență și gestionare a formalităților vamale, facilitând transportul internațional.
                            <br><br>
                            Servicii de ambalare: Pentru a asigura siguranța coletelor, companiile de curierat rapid oferă servicii de ambalare profesionale și materiale de ambalare adecvate.
                            <br><br>
                            Este important să se respecte regulamentele și cerințele vamale specifice fiecărei țări în timpul expedierii coletelor internaționale prin curierat rapid.
                            <br><br>
                            Acestea sunt doar câteva aspecte importante ale curieratului rapid. Dacă doriți informații mai detaliate sau specifice, este recomandat să consultați documentațiile și ghidurile oferite de companiile de curierat rapid sau să vă adresați autorităților vamale și organizațiilor guvernamentale relevante în țara dumneavoastră.
                        </p>

                        <img class="page-content-sign" src="{{ asset('modules/nedcurier/img/ned-sign.png') }}">
                    </div>
                </div>
            </div>
        </section>


    </main>
    <!-- End #main -->
@endsection

